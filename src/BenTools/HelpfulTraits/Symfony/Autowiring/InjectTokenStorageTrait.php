<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

trait InjectTokenStorageTrait
{

    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @param TokenStorageInterface $tokenStorage
     * @required
     */
    public function setTokenStorage(TokenStorageInterface $tokenStorage): void
    {
        $this->tokenStorage = $tokenStorage;
    }
}
