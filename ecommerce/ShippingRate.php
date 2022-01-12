<?php

class ShippingRate
{
    protected Address $address;
    protected ShippingRateApi $api;
    protected int $weight; // in lbs

    public function __construct() {
        $this->api = new ShippingRateApi;
    }

    public function setAddress(Address $address): self{
        $this->address = $address;
        return $this;
    }

    public function setWeight(int $weight): self{
        $this->weight = $weight;
        return $this;
    }

    public function getShippingAmount(): float {
        return round($this->api->getAmount($this->address, $this->weight),2);
    }
}