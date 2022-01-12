<?php

class Name
{
    protected string $firstName;
    protected string $lastName;

    public function setFirstName(string $firstName): self{
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): self{
        $this->lastName = $lastName;
        return $this;
    }

    public function getFirstName(): string{
        return $this->firstName;
    }

    public function getLastName(): string{
        return $this->lastName;
    }

    public function getName(): string{
        return $this->firstName . ' ' . $this->lastName;
    }
}