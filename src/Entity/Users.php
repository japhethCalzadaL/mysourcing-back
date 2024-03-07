<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 125, nullable: false)]
    private ?string $name;

    #[ORM\Column(length: 125, nullable: false)]
    private ?string $lastName;

    #[ORM\Column(length: 125, nullable: false)]
    private ?string $lastSecondName;

    #[ORM\Column(length: 125, nullable: false)]
    private ?string $email;

    #[ORM\Column(length: 10, nullable: false)]
    private ?string $phone;

    #[ORM\Column(length: 5, nullable: false)]
    private ?string $postalCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLastSecondName(): ?string
    {
        return $this->lastSecondName;
    }

    public function setLastSecondName(?string $lastSecondName): static
    {
        $this->lastSecondName = $lastSecondName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'lastName'          => $this->lastName,
            'lastSecondName'    => $this->lastSecondName,
            'email'             => $this->email, 
            'phone'             => $this->phone, 
            'postalCode'        => $this->postalCode
        ];
    }
}
