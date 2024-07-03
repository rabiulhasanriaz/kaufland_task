<?php

namespace App\Tests;

use App\Command\ProcessXmlCommand;
use App\Entity\ProcessXMLEntity;
use Doctrine\ORM\EntityManagerInterface;
use App\DataStorage\DataStorageInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ProcessXMLCommandTest extends TestCase
{
    private DataStorageInterface & MockObject $dataStorage;
    private LoggerInterface & MockObject $logger;

    protected function setUp(): void
    {
        $this->dataStorage = $this->createMock(DataStorageInterface::class);
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->command = new ProcessXMLCommand($this->dataStorage, $this->logger);
    }
    public function testExecute(): void
    {
        $this->dataStorage->expects($this->any())
            ->method('findExistingEntity')
            ->willReturnCallback(function ($entityId) {
                // Simulate finding an existing entity with even entity_id
                return $entityId % 2 === 0 ? new ProcessXMLEntity() : null;
            });

        $this->dataStorage->expects($this->any())
            ->method('persistEntity')
            ->willReturnCallback(function ($entity) {
                // Simulate persisting the entity
            });

        $this->logger->expects($this->never())
            ->method('error');

        $xmlData = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<catalog>
    <item>
        <entity_id>1</entity_id>
        <CategoryName><![CDATA[Category 1]]></CategoryName>
        <sku>SKU1</sku>
        <name><![CDATA[Product 1]]></name>
        <description><![CDATA[]]></description>
        <shortdesc><![CDATA[Short description]]></shortdesc>
        <price>10.5</price>
        <link>http://example.com/product1</link>
        <image>http://example.com/images/product1.jpg</image>
        <Brand><![CDATA[Brand1]]></Brand>
        <Rating>5</Rating>
        <CaffeineType><![CDATA[Caffeinated]]></CaffeineType>
        <Count>10</Count>
        <Flavored>No</Flavored>
        <Seasonal>No</Seasonal>
        <Instock>Yes</Instock>
        <Facebook>1</Facebook>
        <IsKCup>0</IsKCup>
    </item>
</catalog>
XML;

        // Write XML content to a temporary file
        file_put_contents('xml/feed1.xml', $xmlData);

        $application = new Application();
        $application->add($this->command);

        $commandTester = new CommandTester($this->command);
        $commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        // Assertions
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('XML data has been processed and stored into the database.', $output);

        // Clean up: remove temporary XML file
        unlink('xml/feed1.xml');
    }
    public function testExecuteFailure(): void
    {
        $this->dataStorage->expects($this->once())
            ->method('persistEntity')
            ->willThrowException(new \Exception('Mock exception during persistence'));

        $this->logger->expects($this->once())
            ->method('error')
            ->with($this->stringContains('Error processing XML file: Mock exception during persistence'));
        $application = new Application();
        $application->add($this->command);

        $commandTester = new CommandTester($this->command);
        $commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('An error occurred. Check the log file for details.', $output);
    }
}
