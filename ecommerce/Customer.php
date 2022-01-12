<?php

class Customer
{
    protected Name $name;
    protected Address $address;

    public function setName(Name $name): self {
        $this->name = $name;
        return $this;
    }

    public function setAddress(Address $address): self {
        $this->address = $address;
        return $this;
    }

    public function getName(): Name {
        return $this->name;
    }

    public function getAddress(): Address {
        return $this->address;
    }
}