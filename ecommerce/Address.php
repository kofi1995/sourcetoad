<?php

class Address
{
    protected string $address1;
    protected string $address2;
    protected string $city;
    protected string $state;
    protected string $zip;

    public function setAddress1(string $address1): self{
        $this->address1 = $address1;
        return $this;
    }

    public function setAddress2(string $address2): self{
        $this->address2 = $address2;
        return $this;
    }

    public function setCity(string $city): self{
        $this->city = $city;
        return $this;
    }

    public function setState(string $state): self{
        $this->state = $state;
        return $this;
    }

    public function setZip(string $zip): self{
        $this->zip = $zip;
        return $this;
    }

    public function getAddress1(): string{
        return $this->address1;
    }

    public function getAddress2(): string{
        return $this->address2;
    }

    public function getCity(): string{
        return $this->city;
    }

    public function getState(): string{
        return $this->state;
    }

    public function getZip(): string{
        return $this->zip;
    }
}