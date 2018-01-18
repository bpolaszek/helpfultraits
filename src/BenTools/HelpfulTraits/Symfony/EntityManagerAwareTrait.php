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
     * @param string|null $name
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
     * @param $class - An object or a class name
     * @return ObjectManager|EntityManager
     */
    protected function getEntityManagerOf($class)
    {
        if (!$this->managerRegistry) {
            throw new \LogicException('Doctrine has not been properly injected.');
        }
        if (is_object($class)) {
            $class = ClassUtils::getClass($class);
        }
        return $this->managerRegistry->getManagerForClass($class);
    }

    /**
     * @param $class - An object or a class name
     * @return ObjectRepository|EntityRepository
     */
    protected function getRepositoryOf($class)
    {
        if (is_object($class)) {
            $class = ClassUtils::getClass($class);
        }
        return $this->getEntityManagerOf($class)->getRepository($class);
    }
}
