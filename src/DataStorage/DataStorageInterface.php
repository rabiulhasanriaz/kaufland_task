<?php
namespace App\DataStorage;

use App\Entity\ProcessXMLEntity;

interface DataStorageInterface
{
    public function findExistingEntity(int $entityId): ?ProcessXMLEntity;

    public function persistEntity(ProcessXMLEntity $entity): void;

    public function flush(): void;
}