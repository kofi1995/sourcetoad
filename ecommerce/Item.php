<?php

class Item
{
    protected string $name;
    protected float $price;
    protected int $weight; // in lbs

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function setPrice(float $price): self {
        $this->price = $price;
        return $this;
    }

    public function setWeight(int $weight): self {
        $this->weight = $weight;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return round($this->price, 2);
    }

    public function getWeight(): int {
        return $this->weight;
    }

    public function getTaxAmount(): int{
        return (new Tax)->setItem($this)->getTaxAmount();
    }
}