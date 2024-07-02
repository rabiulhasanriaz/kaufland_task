<?php

namespace App\Command;

use App\Entity\ProcessXMLEntity;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:process-xml',
    description: 'Add a short description for your command',
)]
class ProcessXmlCommand extends Command
{
    private $em;
    private $logger;
    public function __construct(EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $xml = simplexml_load_file('xml/feed.xml');

            foreach ($xml->item as $item) {
                $product = new ProcessXMLEntity();
                $product->setEntityId((int)$item->entity_id);
                $product->setCategoryName((string)$item->CategoryName);
                $product->setSku((string)$item->sku);
                $product->setName((string)$item->name);
                $product->setDescription((string)$item->description);
                $product->setShortdesc((string)$item->shortdesc);
                $product->setPrice((float)$item->price);
                $product->setLink((string)$item->link);
                $product->setImage((string)$item->image);
                $product->setBrand((string)$item->Brand);
                $product->setRating((int)$item->Rating);
                $product->setCaffeineType((string)$item->CaffeineType);
                $product->setCount($item->Count ? (int)$item->Count : null);
                $product->setFlavored((string)$item->Flavored === 'Yes');
                $product->setSeasonal((string)$item->Seasonal === 'Yes');
                $product->setInstock((string)$item->Instock === 'Yes');
                $product->setFacebook((string)$item->Facebook === '1');
                $product->setIsKCup((string)$item->IsKCup === '1');

                $this->em->persist($product);
            }

            $this->em->flush();

            $output->writeln('XML data has been processed and stored into the database.');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->logger->error('Error processing XML file: ' . $e->getMessage());
            $output->writeln('An error occurred. Check the log file for details.');

            return Command::FAILURE;
        }
    }
}