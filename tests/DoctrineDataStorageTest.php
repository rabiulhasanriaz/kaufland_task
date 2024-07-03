<?php

namespace App\Tests;

use App\DataStorage\DoctrineDataStorage;
use App\Entity\ProcessXMLEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DoctrineDataStorageTest extends TestCase
{
    private EntityManagerInterface & MockObject $entityManager;
    private EntityRepository & MockObject $repository;
    private DoctrineDataStorage $dataStorage;
    protected function setUp(): void
    {
        parent::setUp();

        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->repository = $this->createMock(EntityRepository::class);

        $this->dataStorage = new DoctrineDataStorage($this->entityManager);
    }

    public function testFindExistingEntity(): void
    {
        $entityId = 1;
        $existingEntity = new ProcessXMLEntity();
        $existingEntity->setEntityId($entityId);

        $this->entityManager->expects($this->once())
            ->method('getRepository')
            ->with(ProcessXMLEntity::class)
            ->willReturn($this->repository);

        $this->repository->expects($this->once())
            ->method('findOneBy')
            ->with(['entity_id' => $entityId])
            ->willReturn($existingEntity);

        $result = $this->dataStorage->findExistingEntity($entityId);

        $this->assertSame($existingEntity, $result);
    }


    public function testPersistEntity(): void
    {
        $entity = new ProcessXMLEntity();
        $entity->setEntityId(1);

        $this->entityManager->expects($this->once())
            ->method('persist')
            ->with($entity);

        $this->dataStorage->persistEntity($entity);
    }

    public function testFlush(): void
    {
        $this->entityManager->expects($this->once())
            ->method('flush');

        $this->dataStorage->flush();
    }
}
