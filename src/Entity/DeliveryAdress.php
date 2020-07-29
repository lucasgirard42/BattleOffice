<?php

namespace App\Entity;

use App\Repository\DeliveryAdressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryAdressRepository::class)
 */
class DeliveryAdress
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $additionnalAdress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $postal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $phone;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, mappedBy="deliveryAdress", cascade={"persist", "remove"})
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="deliveryAdresses")
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getAdditionnalAdress(): ?string
    {
        return $this->additionnalAdress;
    }

    public function setAdditionnalAdress(?string $additionnalAdress): self
    {
        $this->additionnalAdress = $additionnalAdress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->postal;
    }

    public function setPostal(?string $postal): self
    {
        $this->postal = $postal;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        // set (or unset) the owning side of the relation if necessary
        $newDeliveryAdress = null === $client ? null : $this;
        if ($client->getDeliveryAdress() !== $newDeliveryAdress) {
            $client->setDeliveryAdress($newDeliveryAdress);
        }

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public  function __toString()
    {
        return $this->getFirstname();
    }
}
