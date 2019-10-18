<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HarborRepository")
 */
class Harbor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_street;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_city;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $address_zipcode;

    /**
     * @ORM\Column(type="float")
     */
    private $depth;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $phone_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddressStreet(): ?string
    {
        return $this->address_street;
    }

    public function setAddressStreet(string $address_street): self
    {
        $this->address_street = $address_street;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->address_city;
    }

    public function setAddressCity(string $address_city): self
    {
        $this->address_city = $address_city;

        return $this;
    }

    public function getAddressZipcode(): ?string
    {
        return $this->address_zipcode;
    }

    public function setAddressZipcode(string $address_zipcode): self
    {
        $this->address_zipcode = $address_zipcode;

        return $this;
    }

    public function getDepth(): ?float
    {
        return $this->depth;
    }

    public function setDepth(float $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }
}
