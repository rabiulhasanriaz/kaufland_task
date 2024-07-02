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
    public function testExecute()
    {
        $application = new Application();

        $em = $this->createMock(EntityManagerInterface::class);
        $logger = $this->createMock(LoggerInterface::class);

        $application->add(new ProcessXmlCommand($em, $logger));

        $command = $application->find('app:process-xml');
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('XML data has been processed and stored into the database.', $output);
    }
}
