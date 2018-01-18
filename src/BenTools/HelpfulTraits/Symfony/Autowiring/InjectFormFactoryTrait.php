<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Symfony\Component\Form\FormFactoryInterface;

trait InjectFormFactoryTrait
{

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @param FormFactoryInterface $formFactory
     * @required
     */
    public function setFormFactory(FormFactoryInterface $formFactory): void
    {
        $this->formFactory = $formFactory;
    }
}
