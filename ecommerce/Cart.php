<?php

class Cart
{
    protected array $items = [];
    protected Customer $customer;
    protected ?Address $shippingAddress = null;

    public function addItems(Item $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function setShippingAddress(Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getShippingAddress(): Address
    {
        if(!$this->shippingAddress) {
            return $this->customer->getAddress();
        }
        return $this->shippingAddress;
    }

    public function getTotalWeight(): int
    {
        $weights = array_map(function(Item $item)
        {
            return $item->getWeight();
        }, $this->items);
        return array_sum($weights);
    }

    public function getSubTotal(): float
    {
        $weights = array_map(function(Item $item)
        {
            return $item->getPrice();
        }, $this->items);
        return array_sum($weights);
    }

    public function getTaxAmount(): float
    {
        $weights = array_map(function(Item $item)
        {
            return $item->getTaxAmount();
        }, $this->items);
        return array_sum($weights);
    }

    public function getShippingAmount(): float
    {
        return (new ShippingRate)
            ->setAddress($this->getShippingAddress())
            ->setWeight($this->getTotalWeight())
            ->getShippingAmount();
    }

    public function getTotal(): float
    {
        // this assumes the shipping amount is not taxable
        return $this->getSubTotal() + $this->getShippingAmount() + $this->getTaxAmount();
    }
}