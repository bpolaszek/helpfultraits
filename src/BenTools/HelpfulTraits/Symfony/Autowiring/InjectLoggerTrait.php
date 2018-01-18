<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Psr\Log\LoggerInterface;

trait InjectLoggerTrait
{

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     * @required
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
