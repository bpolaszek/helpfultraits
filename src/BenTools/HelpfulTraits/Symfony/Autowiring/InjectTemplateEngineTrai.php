<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\Templating\EngineInterface;

trait InjectTemplateEngineTrai
{

    /**
     * @var EngineInterface
     */
    protected $templateEngine;

    /**
     * @param EngineInterface $templateEngine
     * @required
     */
    public function setTemplateEngine(EngineInterface $templateEngine): void
    {
        $this->templateEngine = $templateEngine;
    }
}
