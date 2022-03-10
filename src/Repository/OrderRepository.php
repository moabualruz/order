<?php
declare(strict_types=1);

namespace Order\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Order\Entity\Order;

class OrderRepository extends EntityRepository
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager, ClassMetadata $class)
    {
        parent::__construct($manager, $class);
        $this->manager = $manager;
    }

    public function save(Order $order)
    {
        $this->manager->persist($order);
        $this->manager->flush();
    }

    public function remove(Order $order)
    {
        $this->manager->remove($order);
        $this->manager->flush();
    }

}