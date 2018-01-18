<?php
namespace BenTools\HelpfulTraits\Symfony;

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\User\UserInterface;

trait SecurityAwareTrait
{

    /**
     * Get a user from the Security Token Storage.
     *
     * @return mixed|UserInterface|string|null
     *
     * @throws \LogicException If SecurityBundle is not available
     *
     * @see TokenInterface::getUser()
     */
    protected function getUser()
    {
        if (!$this->tokenStorage) {
            throw new \LogicException('The token storage has not been properly injected.');
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

    /**
     * Checks if the attributes are granted against the current authentication token and optionally supplied subject.
     *
     * @param mixed $attributes
     * @param mixed $subject
     *
     * @return bool
     */
    protected function isGranted($attributes, $subject = null): bool
    {
        if (!$this->authorizationChecker) {
            throw new \LogicException('The authorization checker has not been properly injected.');
        }
        return $this->authorizationChecker->isGranted($attributes, $subject);
    }


    /**
     * Throws an exception unless the attributes are granted against the current authentication token and optionally
     * supplied object.
     *
     * @param mixed $attributes The attributes
     * @param mixed $object The object
     * @param string $message The message passed to the exception
     *
     * @throws AccessDeniedException
     */
    protected function denyAccessIfNotGranted($attributes, $object = null, $message = 'Access Denied.')
    {
        if (!$this->isGranted($attributes, $object)) {
            throw new AccessDeniedHttpException($message);
        }
    }
}
