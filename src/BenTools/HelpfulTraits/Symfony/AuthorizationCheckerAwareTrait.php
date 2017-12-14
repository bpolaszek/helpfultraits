<?php
namespace BenTools\HelpfulTraits\Symfony;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

trait AuthorizationCheckerAwareTrait
{

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

    /**
     * @return AuthorizationCheckerInterface
     */
    public function getAuthorizationChecker()
    {
        return $this->authorizationChecker;
    }

    /**
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @return $this - Provides Fluent Interface
     */
    public function setAuthorizationChecker(AuthorizationCheckerInterface $authorizationChecker = null)
    {
        $this->authorizationChecker = $authorizationChecker;
        return $this;
    }
}
