<?php
namespace BenTools\HelpfulTraits\Symfony;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

trait TokenStorageAwareTrait {

    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @return TokenStorageInterface
     */
    public function getTokenStorage() {
        return $this->tokenStorage;
    }

    /**
     * @param TokenStorageInterface $tokenStorage
     * @return $this - Provides Fluent Interface
     */
    public function setTokenStorage(TokenStorageInterface $tokenStorage = null) {
        $this->tokenStorage = $tokenStorage;
        return $this;
    }

    /**
     * Get a user from the Security Token Storage.
     *
     * @return mixed
     *
     * @throws \LogicException If SecurityBundle is not available
     *
     * @see TokenInterface::getUser()
     */
    public function getUser() {
        if (!$this->tokenStorage) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->tokenStorage->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }

        return $user;
    }
}