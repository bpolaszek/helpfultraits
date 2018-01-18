<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use GuzzleHttp\ClientInterface;

trait InjectGuzzleTrait
{

    /**
     * @var ClientInterface
     */
    protected $guzzle;

    /**
     * @param ClientInterface $guzzle
     * @required
     */
    public function setGuzzle(ClientInterface $guzzle): void
    {
        $this->guzzle = $guzzle;
    }
}
