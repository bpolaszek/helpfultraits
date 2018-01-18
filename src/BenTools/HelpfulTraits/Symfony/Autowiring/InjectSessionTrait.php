<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

trait InjectSessionTrait
{

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @param SessionInterface $session
     * @required
     */
    public function setSession(SessionInterface $session): void
    {
        $this->session = $session;
    }
}
