<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class UserDTO
{
    #[Assert\NotBlank(message: 'El campo nombre es obligatorio')]
    private $name;

    #[Assert\NotBlank(message: 'El campo apellido paterno es obligatorio')]
    private $lastName;

    #[Assert\NotBlank(message: 'El campo apellido materno es obligatorio')]
    private $lastSecondName;

    #[Assert\NotBlank(message: 'El campo email es obligatorio')]
    private $email;

    #[Assert\NotBlank(message: 'El campo telefono es obligatorio')]
    private $phone;

    #[Assert\NotBlank(message: 'El campo código postal es obligatorio')]
    private $postalCode;

    


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     */
    public function setLastName($lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of lastSecondName
     */
    public function getLastSecondName()
    {
        return $this->lastSecondName;
    }

    /**
     * Set the value of lastSecondName
     */
    public function setLastSecondName($lastSecondName): self
    {
        $this->lastSecondName = $lastSecondName;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     */
    public function setPostalCode($postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}