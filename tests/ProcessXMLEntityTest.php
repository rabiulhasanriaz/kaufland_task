<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\ProcessXMLEntity;

class ProcessXMLEntityTest extends TestCase
{
    public function testGetId(): void
    {
        $entity = new ProcessXMLEntity();
        $entity->setId(123);

        $this->assertEquals(123, $entity->getId());
    }
    public function testGetEntityId(): void
    {
        $entity = new ProcessXMLEntity();
        $entity->setEntityId(456);

        $this->assertEquals(456, $entity->getEntityId());
    }

    public function testGetCategoryName(): void
    {
        $entity = new ProcessXMLEntity();
        $entity->setCategoryName('Electronics');

        $this->assertEquals('Electronics', $entity->getCategoryName());
    }
    public function testGetSku(): void
    {
        $entity = new ProcessXMLEntity();
        $entity->setSku('ABC123');

        $this->assertEquals('ABC123', $entity->getSku());
    }
    public function testGetName(): void
    {
        $entity = new ProcessXMLEntity();
        $entity->setName('Test Product');

        $this->assertEquals('Test Product', $entity->getName());
    }
    public function testGetDescription(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when description is not set (should return null)
        $this->assertNull($entity->getDescription());

        // Test when description is set
        $entity->setDescription('This is a test description.');
        $this->assertEquals('This is a test description.', $entity->getDescription());
    }
    public function testGetShortdesc(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when shortdesc is not set (should return null)
        $this->assertNull($entity->getShortdesc());

        // Test when shortdesc is set
        $entity->setShortdesc('This is a test short description.');
        $this->assertEquals('This is a test short description.', $entity->getShortdesc());
    }
    public function testGetPrice(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the price
        $entity->setPrice(19.99);
        $this->assertEquals(19.99, $entity->getPrice());
    }
    public function testGetLink(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the link
        $entity->setLink('https://example.com');
        $this->assertEquals('https://example.com', $entity->getLink());
    }
    public function testGetImage(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the image
        $entity->setImage('example.jpg');
        $this->assertEquals('example.jpg', $entity->getImage());
    }
    public function testGetBrand(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the brand
        $entity->setBrand('Example Brand');
        $this->assertEquals('Example Brand', $entity->getBrand());
    }
    public function testGetRating(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the rating
        $entity->setRating(5);
        $this->assertEquals(5, $entity->getRating());
    }
    public function testGetCaffeineType(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the caffeine type
        $entity->setCaffeineType('Decaffeinated');
        $this->assertEquals('Decaffeinated', $entity->getCaffeineType());
    }
    public function testGetCount(): void
    {
        $entity = new ProcessXMLEntity();

        // Set the count value
        $entity->setCount(5);
        $this->assertEquals(5, $entity->getCount());

        // Test with null value
        $entity->setCount(null);
        $this->assertNull($entity->getCount());
    }
    public function testIsFlavored(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when flavored is true
        $entity->setFlavored(true);
        $this->assertTrue($entity->isFlavored());

        // Test when flavored is false
        $entity->setFlavored(false);
        $this->assertFalse($entity->isFlavored());
    }
    public function testIsSeasonal(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when seasonal is true
        $entity->setSeasonal(true);
        $this->assertTrue($entity->isSeasonal());

        // Test when seasonal is false
        $entity->setSeasonal(false);
        $this->assertFalse($entity->isSeasonal());
    }
    public function testIsInstock(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when instock is true
        $entity->setInstock(true);
        $this->assertTrue($entity->isInstock());

        // Test when instock is false
        $entity->setInstock(false);
        $this->assertFalse($entity->isInstock());
    }
    public function testIsFacebook(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when Facebook is true
        $entity->setFacebook(true);
        $this->assertTrue($entity->isFacebook());

        // Test when Facebook is false
        $entity->setFacebook(false);
        $this->assertFalse($entity->isFacebook());
    }
    public function testIsIsKCup(): void
    {
        $entity = new ProcessXMLEntity();

        // Test when IsKCup is true
        $entity->setIsKCup(true);
        $this->assertTrue($entity->isIsKCup());

        // Test when IsKCup is false
        $entity->setIsKCup(false);
        $this->assertFalse($entity->isIsKCup());
    }
}
