<?php

namespace FabricShop;

final class Price
{
    private $cents;

    public static function fromCents(int $value_in_cents): self
    {
        return new self($value_in_cents);
    }

    private function __construct(int $value_in_cents)
    {
        $this->cents = $value_in_cents;
    }

    public function multiply(float $factor): Price
    {
        return new self($this->cents * $factor);
    }

    public function add(Price $other): Price
    {
        return new self($this->cents + $other->cents);
    }
}
