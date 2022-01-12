<?php

class Tax
{
    protected Item $item;
    protected float $rate = 0.07;

    public function setItem(Item $item): self
    {
        $this->item = $item;
        return $this;
    }

    public function getTaxRate(): float{
        return $this->rate;
    }

    public function getTaxAmount(): float{
        return round($this->item->getPrice() * $this->rate, 2);
    }
}