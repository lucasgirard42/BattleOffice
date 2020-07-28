<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $promo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sellNumber;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $offerNumber;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPopular;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="product")
     */
    private $orders;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPromo(): ?float
    {
        return $this->promo;
    }

    public function setPromo(?float $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getSellNumber(): ?int
    {
        return $this->sellNumber;
    }

    public function setSellNumber(?int $sellNumber): self
    {
        $this->sellNumber = $sellNumber;

        return $this;
    }

    public function getOfferNumber(): ?int
    {
        return $this->offerNumber;
    }

    public function setOfferNumber(?int $offerNumber): self
    {
        $this->offerNumber = $offerNumber;

        return $this;
    }

    public function getIsPopular(): ?bool
    {
        return $this->isPopular;
    }

    public function setIsPopular(?bool $isPopular): self
    {
        $this->isPopular = $isPopular;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setProduct($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getProduct() === $this) {
                $order->setProduct(null);
            }
        }

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
