<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $productCategory = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Promotion $productPromotion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getlabel(): ?string
    {
        return $this->label;
    }

    public function setlabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getProductCategory(): ?Category
    {
        return $this->productCategory;
    }

    public function setProductCategory(?Category $productCategory): self
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getProductPromotion(): ?Promotion
    {
        return $this->productPromotion;
    }

    public function setProductPromotion(?Promotion $productPromotion): self
    {
        $this->productPromotion = $productPromotion;

        return $this;
    }

    public function __toString()
    {
        return $this->getlabel();
    }
}
