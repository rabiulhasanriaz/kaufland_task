<?php

namespace App\Entity;

use App\Repository\ProcessXMLEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcessXMLEntityRepository::class)]
class ProcessXMLEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;
    #[ORM\Column(type: "integer")]
    private $entity_id;
    #[ORM\Column(type: "string", length: 255)]
    private $category_name;
    #[ORM\Column(type: "string", length: 255)]
    private $sku;
    #[ORM\Column(type: "text")]
    private $name;
    #[ORM\Column(type: "text", nullable: true)]
    private $description;
    #[ORM\Column(type: "text", nullable: true)]
    private $shortdesc;
    #[ORM\Column(type: "decimal", precision: 10, scale: 4)]
    private $price;
    #[ORM\Column(type: "text")]
    private $link;
    #[ORM\Column(type: "text")]
    private $image;
    #[ORM\Column(type: "string", length: 255)]
    private $brand;
    #[ORM\Column(type: "integer")]
    private $rating;
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $caffeine_type;
    #[ORM\Column(type: "integer", nullable: true)]
    private $count;
    #[ORM\Column(type: "boolean")]
    private $flavored;
    #[ORM\Column(type: "boolean")]
    private $seasonal;
    #[ORM\Column(type: "boolean")]
    private $instock;
    #[ORM\Column(type: "boolean")]
    private $facebook;
    #[ORM\Column(type: "boolean")]
    private $iskcup;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getEntityId(): int
    {
        return $this->entity_id;
    }

    public function setEntityId(int $entity_id): self
    {
        $this->entity_id = $entity_id;
        return $this;
    }

    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;
        return $this;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getShortdesc(): ?string
    {
        return $this->shortdesc;
    }

    public function setShortdesc(?string $shortdesc): self
    {
        $this->shortdesc = $shortdesc;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    public function getCaffeineType(): ?string
    {
        return $this->caffeine_type;
    }

    public function setCaffeineType(?string $caffeine_type): self
    {
        $this->caffeine_type = $caffeine_type;
        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->count = $count;
        return $this;
    }

    public function isFlavored(): bool
    {
        return $this->flavored;
    }

    public function setFlavored(bool $flavored): self
    {
        $this->flavored = $flavored;
        return $this;
    }

    public function isSeasonal(): bool
    {
        return $this->seasonal;
    }

    public function setSeasonal(bool $seasonal): self
    {
        $this->seasonal = $seasonal;
        return $this;
    }

    public function isInstock(): bool
    {
        return $this->instock;
    }

    public function setInstock(bool $instock): self
    {
        $this->instock = $instock;
        return $this;
    }

    public function isFacebook(): bool
    {
        return $this->facebook;
    }

    public function setFacebook(bool $facebook): self
    {
        $this->facebook = $facebook;
        return $this;
    }

    public function isIsKCup(): bool
    {
        return $this->iskcup;
    }

    public function setIsKCup(bool $iskcup): self
    {
        $this->iskcup = $iskcup;
        return $this;
    }
}
