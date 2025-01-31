<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Personalization\Event\Listener;

use GuzzleHttp\Exception\RequestException;
use Ibexa\Contracts\Core\SiteAccess\ConfigResolverInterface;
use Ibexa\Core\MVC\Symfony\Security\UserInterface;
use Ibexa\Core\MVC\Symfony\SiteAccess\SiteAccessServiceInterface;
use Ibexa\Personalization\Client\PersonalizationClientInterface;
use Ibexa\Personalization\Value\Session as RecommendationSession;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Sends notification to Recommendation servers when user is logged in.
 */
final class LoginListener
{
    /** @var \Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface */
    private $authorizationChecker;

    /** @var \Symfony\Component\HttpFoundation\Session\SessionInterface */
    private $session;

    /** @var \Ibexa\Personalization\Client\PersonalizationClientInterface */
    private $client;

    /** @var \Ibexa\Contracts\Core\SiteAccess\ConfigResolverInterface */
    private $configResolver;

    /** @var \Psr\Log\LoggerInterface|null */
    private $logger;

    /** @var \Ibexa\Core\MVC\Symfony\SiteAccess\SiteAccessServiceInterface */
    private $siteAccessService;

    private string $trackingEndpointUrl;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        AuthorizationCheckerInterface $authorizationChecker,
        SessionInterface $session,
        PersonalizationClientInterface $client,
        ConfigResolverInterface $configResolver,
        LoggerInterface $logger,
        SiteAccessServiceInterface $siteAccessService,
        string $trackingEndpointUrl
    ) {
        $this->authorizationChecker = $authorizationChecker;
        $this->session = $session;
        $this->client = $client;
        $this->configResolver = $configResolver;
        $this->logger = $logger;
        $this->siteAccessService = $siteAccessService;
        $this->trackingEndpointUrl = $trackingEndpointUrl;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        if ($event->getRequest()->get('is_rest_request')) {
            return;
        }

        if (!$this->authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY') // user has just logged in
            || !$this->authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED') // user has logged in using remember_me cookie
        ) {
            return;
        }

        $currentSiteAccess = $this->siteAccessService->getCurrent();

        if ($currentSiteAccess === null) {
            return;
        }

        $siteAccessName = $currentSiteAccess->name;
        $customerId = $this->getCustomerId($siteAccessName);
        $sessionKey = RecommendationSession::RECOMMENDATION_SESSION_KEY;

        if (!isset($customerId)) {
            return;
        }

        if (!$event->getRequest()->cookies->has($sessionKey)) {
            if (!$this->session->isStarted()) {
                $this->session->start();
            }
            $event->getRequest()->cookies->set($sessionKey, $this->session->getId());
        }

        $notificationUri = $this->getNotificationUri(
            $this->trackingEndpointUrl,
            $customerId,
            (string) $event->getRequest()->cookies->get($sessionKey),
            $this->getUser($event->getAuthenticationToken())
        );

        $this->logger->debug(sprintf('Send login event notification to Recommendation: %s', $notificationUri));

        try {
            /** @var \Psr\Http\Message\ResponseInterface $response */
            $response = $this->client->getHttpClient()->get($notificationUri);

            $this->logger->debug(sprintf('Got %s from Recommendation login event notification', $response->getStatusCode()));
        } catch (RequestException $e) {
            $this->logger->error(sprintf('Recommendation login event notification error: %s', $e->getMessage()));
        }
    }

    private function getCustomerId(string $siteAccessName): ?int
    {
        $parameterNameCustomerId = 'personalization.authentication.customer_id';

        if (!$this->configResolver->hasParameter(
            $parameterNameCustomerId,
            null,
            $siteAccessName
        )) {
            return null;
        }

        $customerId = (int)$this->configResolver->getParameter(
            $parameterNameCustomerId,
            null,
            $siteAccessName
        );

        return $customerId ?: null;
    }

    /**
     * Returns notification API end-point.
     */
    private function getNotificationUri(string $endpoint, int $customerId, string $sessionId, string $userId): string
    {
        return sprintf(
            '%s/api/%d/%s/%s/%s',
            $endpoint,
            $customerId,
            'login',
            $sessionId,
            $userId
        );
    }

    /**
     * Returns current username or ApiUser id.
     */
    private function getUser(TokenInterface $authenticationToken): string
    {
        $user = $authenticationToken->getUser();
        if ($user instanceof UserInterface) {
            return (string) $user->getAPIUser()->id;
        }

        return $authenticationToken->getUserIdentifier();
    }
}

class_alias(LoginListener::class, 'EzSystems\EzRecommendationClient\Event\Listener\LoginListener');
