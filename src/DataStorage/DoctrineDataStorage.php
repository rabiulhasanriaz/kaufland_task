<?php

namespace App\DataStorage;

use App\Entity\ProcessXMLEntity;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineDataStorage implements DataStorageInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findExistingEntity(int $entityId): ?ProcessXMLEntity
    {
        return $this->entityManager->getRepository(ProcessXMLEntity::class)->findOneBy(['entity_id' => $entityId]);
    }

    public function persistEntity(ProcessXMLEntity $entity): void
    {
        $this->entityManager->persist($entity);
    }

    public function flush(): void
    {
        $this->entityManager->flush();
    }
}