<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Bundle\Core\Fragment;

use Ibexa\Core\MVC\Symfony\Component\Serializer\SerializerTrait;
use Ibexa\Core\MVC\Symfony\SiteAccess;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

trait SiteAccessSerializationTrait
{
    use SerializerTrait;

    public function serializeSiteAccess(SiteAccess $siteAccess, ControllerReference $uri): void
    {
        // Serialize the siteaccess to get it back after. @see \Ibexa\Core\MVC\Symfony\EventListener\SiteAccessMatchListener
        $uri->attributes['serialized_siteaccess'] = json_encode($siteAccess);
        $uri->attributes['serialized_siteaccess_matcher'] = $this->getSerializer()->serialize(
            $siteAccess->matcher,
            'json',
            [AbstractNormalizer::IGNORED_ATTRIBUTES => ['request', 'container', 'matcherBuilder', 'connection']]
        );
        if ($siteAccess->matcher instanceof SiteAccess\Matcher\CompoundInterface) {
            $subMatchers = $siteAccess->matcher->getSubMatchers();
            foreach ($subMatchers as $subMatcher) {
                $uri->attributes['serialized_siteaccess_sub_matchers'][get_class($subMatcher)] = $this->getSerializer()->serialize(
                    $subMatcher,
                    'json',
                    [AbstractNormalizer::IGNORED_ATTRIBUTES => ['request', 'container', 'matcherBuilder', 'connection']]
                );
            }
        }
    }
}

class_alias(SiteAccessSerializationTrait::class, 'eZ\Bundle\EzPublishCoreBundle\Fragment\SiteAccessSerializationTrait');
