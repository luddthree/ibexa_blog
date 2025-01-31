<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authentication_Provider_Dao_IbexaFrontService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authentication.provider.dao.ibexa_front' shared service.
     *
     * @return \Ibexa\Core\MVC\Symfony\Security\Authentication\RepositoryAuthenticationProvider
     *
     * @deprecated Since symfony/security-bundle 5.3: The "security.authentication.provider.dao.ibexa_front" service is deprecated, use the new authenticator system instead.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('symfony/security-bundle', '5.3', 'The "security.authentication.provider.dao.ibexa_front" service is deprecated, use the new authenticator system instead.');

        include_once \dirname(__DIR__, 4).'/vendor/symfony/password-hasher/Hasher/PasswordHasherFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/password-hasher/Hasher/PasswordHasherFactory.php';

        $container->privates['security.authentication.provider.dao.ibexa_front'] = $instance = new \Ibexa\Core\MVC\Symfony\Security\Authentication\RepositoryAuthenticationProvider(($container->privates['Ibexa\\Core\\MVC\\Symfony\\Security\\User\\UsernameProvider'] ?? $container->load('getUsernameProviderService')), ($container->privates['Ibexa\\Bundle\\CorporateAccount\\Security\\MemberChecker'] ?? $container->load('getMemberCheckerService')), 'ibexa_front', ($container->privates['security.password_hasher_factory'] ?? ($container->privates['security.password_hasher_factory'] = new \Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory([]))), true);

        $instance->setPermissionResolver(($container->privates['Ibexa\\Core\\Repository\\Permission\\CachedPermissionService'] ?? $container->getCachedPermissionServiceService()));
        $instance->setUserService(($container->services['ibexa.api.service.user'] ?? $container->getIbexa_Api_Service_UserService()));
        $instance->setConstantAuthTime(1.0);
        $instance->setLogger(($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        return $instance;
    }
}
