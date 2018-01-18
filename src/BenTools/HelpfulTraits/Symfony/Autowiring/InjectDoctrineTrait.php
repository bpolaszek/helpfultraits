<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Doctrine\Common\Persistence\ManagerRegistry;

trait InjectDoctrineTrait
{

    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * @param ManagerRegistry $managerRegistry
     * @required
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry): void
    {
        $this->managerRegistry = $managerRegistry;
    }
}
