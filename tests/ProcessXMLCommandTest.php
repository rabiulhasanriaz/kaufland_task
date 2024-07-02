<?php

namespace App\Tests;

use App\Command\ProcessXmlCommand;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ProcessXMLCommandTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
    public function testExecute(): void
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->expects($this->any())
            ->method('persist')
            ->willReturnCallback(function ($entity) {
            });
        $entityManager->expects($this->once())
            ->method('flush');
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->never())
        ->method('error');

        $command = new ProcessXmlCommand($entityManager, $logger);

        $xmlData = '<xml><item><entity_id>1</entity_id><CategoryName>Category 1</CategoryName><sku>SKU1</sku><name>Product 1</name></item></xml>';
        file_put_contents('xml/feed1.xml', $xmlData);

        $application = new Application();
        $application->add($command);
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
        ]);
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('XML data has been processed and stored into the database.', $output);

        unlink('xml/feed1.xml');
    }
    public function testExecuteFailure(): void
    {

        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->expects($this->once())
            ->method('persist')
            ->willThrowException(new \Exception('Mock exception during persistence'));

        // Mock LoggerInterface
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('error')
            ->with($this->stringContains('Error processing XML file: Mock exception during persistence'));
        $command = new ProcessXmlCommand($entityManager, $logger);
        $application = new Application();
        $application->add($command);

        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('An error occurred. Check the log file for details.', $output);
    }
}
