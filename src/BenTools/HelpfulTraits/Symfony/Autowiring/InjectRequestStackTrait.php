<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\HttpFoundation\RequestStack;

trait InjectRequestStackTrait
{

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @param RequestStack $requestStack
     * @required
     */
    public function setRequestStack(RequestStack $requestStack): void
    {
        $this->requestStack = $requestStack;
    }
}
