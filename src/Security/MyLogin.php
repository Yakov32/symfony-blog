<?php


namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class MyLogin extends AbstractFormLoginAuthenticator
{
    public function getCredentials(Request $request)
    {
        // TODO: Implement getCredentials() method.

    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // TODO: Implement checkCredentials() method.
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // TODO: Implement getUser() method.
    }

    public function getLoginUrl()
    {
        // TODO: Implement getLoginUrl() method.
    }

    public function supports(Request $request)
    {
        // TODO: Implement supports() method.
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }

}