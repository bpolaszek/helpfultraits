<?php
namespace BenTools\HelpfulTraits\Symfony;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

trait SessionAwareTrait
{

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
        if (!$this->session) {
            throw new \LogicException('The session service has not been properly injected.');
        }
        if (is_callable([$this->session, 'getFlashBag'])) {
            $this->session->getFlashBag()->add($type, $message);
        }
    }
}
