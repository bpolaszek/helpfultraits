<?php
namespace BenTools\HelpfulTraits\Symfony;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

trait SessionAwareTrait
{

    /**
     * @var SessionInterface|Session
     */
    protected $session;

    /**
     * @return SessionInterface|Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param SessionInterface $session
     * @return $this - Provides Fluent Interface
     */
    public function setSession(SessionInterface $session = null)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * Adds a flash message to the current session for type.
     *
     * @param string $type The type
     * @param string $message The message
     *
     * @throws \LogicException
     */
    protected function addFlash($type, $message)
    {
        if (empty($this->session)) {
            throw new \LogicException('You can not use the addFlash method if sessions are disabled.');
        }
        if (is_callable([$this->session, 'getFlashBag'])) {
            $this->session->getFlashBag()->add($type, $message);
        }
    }
}
