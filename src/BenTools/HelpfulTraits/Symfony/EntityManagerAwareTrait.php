<?php
namespace BenTools\HelpfulTraits\Symfony;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

trait EntityManagerAwareTrait {

    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * @return ManagerRegistry
     */
    public function getManagerRegistry() {
        return $this->managerRegistry;
    }

    /**
     * @param ManagerRegistry $managerRegistry
     * @return $this - Provides Fluent Interface
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry = null) {
        $this->managerRegistry = $managerRegistry;
        return $this;
    }

    /**
     * @return ObjectManager|EntityManager
     */
    public function getEntityManager($name = null) {
        return is_null($name) ? $this->managerRegistry->getManager($this->managerRegistry->getDefaultManagerName()) : $this->managerRegistry->getManager($name);
    }

    /**
     * @param $nameOrObject
     * @return ObjectManager|EntityManager
     */
    public function getEntityManagerOf($nameOrObject) {
        return $this->managerRegistry->getManagerForClass($this->resolveNameOrObject($nameOrObject));
    }

    /**
     * @param $nameOrObject
     * @return string
     */
    private function resolveNameOrObject($nameOrObject) {
        switch (true) {
            case is_object($nameOrObject) && $nameOrObject instanceof \Doctrine\ORM\Proxy\Proxy:
                return get_parent_class($nameOrObject);
            case is_object($nameOrObject):
                return get_class($nameOrObject);
            default:
                return $nameOrObject;
        }
    }

    /**
     * @param $nameOrObject
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepositoryOf($nameOrObject) {
        $name = $this->resolveNameOrObject($nameOrObject);
        return $this->getEntityManagerOf($name)->getRepository($name);
    }

}