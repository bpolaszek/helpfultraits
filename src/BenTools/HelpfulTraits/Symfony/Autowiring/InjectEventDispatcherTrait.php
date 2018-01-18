<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

trait InjectEventDispatcherTrait
{

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @required
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): void
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}
