<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $countries;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="country")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryAdress::class, mappedBy="country")
     */
    private $deliveryAdresses;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->deliveryAdresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountries(): ?string
    {
        return $this->countries;
    }

    public function setCountries(?string $countries): self
    {
        $this->countries = $countries;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setCountry($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getCountry() === $this) {
                $client->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DeliveryAdress[]
     */
    public function getDeliveryAdresses(): Collection
    {
        return $this->deliveryAdresses;
    }

    public function addDeliveryAdress(DeliveryAdress $deliveryAdress): self
    {
        if (!$this->deliveryAdresses->contains($deliveryAdress)) {
            $this->deliveryAdresses[] = $deliveryAdress;
            $deliveryAdress->setCountry($this);
        }

        return $this;
    }

    public function removeDeliveryAdress(DeliveryAdress $deliveryAdress): self
    {
        if ($this->deliveryAdresses->contains($deliveryAdress)) {
            $this->deliveryAdresses->removeElement($deliveryAdress);
            // set the owning side to null (unless already changed)
            if ($deliveryAdress->getCountry() === $this) {
                $deliveryAdress->setCountry(null);
            }
        }

        return $this;
    }

    public  function __toString()
    {
        return $this->getCountries();
    }
}
