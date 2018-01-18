<?php
namespace BenTools\HelpfulTraits\Symfony;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Util\ClassUtils;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

trait EntityManagerAwareTrait
{
    /**
     * @return ObjectManager|EntityManager
     */
    protected function getEntityManager($name = null)
    {
        if (!$this->managerRegistry) {
            throw new \LogicException('Doctrine has not been properly injected.');
        }

        return is_null($name) ? $this->managerRegistry->getManager($this->managerRegistry->getDefaultManagerName()) : $this->managerRegistry->getManager($name);
    }

    /**
     * @param $nameOrObject
     * @return ObjectManager|EntityManager
     */
    protected function getEntityManagerOf($nameOrObject)
    {
        if (!$this->managerRegistry) {
            throw new \LogicException('Doctrine has not been properly injected.');
        }
        if (is_object($nameOrObject)) {
            $class = ClassUtils::getClass($nameOrObject);
        }
        return $this->managerRegistry->getManagerForClass($class);
    }

    /**
     * @param $nameOrObject
     * @return ObjectRepository|EntityRepository
     */
    protected function getRepositoryOf($nameOrObject)
    {
        if (is_object($nameOrObject)) {
            $class = ClassUtils::getClass($nameOrObject);
        }
        return $this->getEntityManagerOf($class)->getRepository($class);
    }
}
