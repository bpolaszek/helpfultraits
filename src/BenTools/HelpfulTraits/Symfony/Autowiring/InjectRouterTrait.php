<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\Routing\RouterInterface;

trait InjectRouterTrait
{

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @param RouterInterface $router
     * @required
     */
    public function setRouter(RouterInterface $router = null)
    {
        $this->router = $router;
    }
}
