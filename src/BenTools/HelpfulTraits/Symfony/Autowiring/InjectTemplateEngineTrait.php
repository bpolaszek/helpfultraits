<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\Templating\EngineInterface;

trait InjectTemplateEngineTrait
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
