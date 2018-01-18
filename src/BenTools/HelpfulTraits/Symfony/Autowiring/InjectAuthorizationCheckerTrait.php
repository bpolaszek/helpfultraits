<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

trait InjectAuthorizationCheckerTrait
{
    /**
     * @var AuthorizationCheckerInterface
     */
    protected $authorizationChecker;

    /**
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @required
     */
    public function setAuthorizationChecker(AuthorizationCheckerInterface $authorizationChecker): void
    {
        $this->authorizationChecker = $authorizationChecker;
    }
}
