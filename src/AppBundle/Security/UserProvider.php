<?php
namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function loadUserByUsername($username)
    {
        $user = new User();
        $user->setUserName($this->session->get('user'));

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        return $user;
    }

    public function supportsClass($class)
    {
        return User::class == $class;
    }
}