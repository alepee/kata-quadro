<?php

namespace FabricShop\Fabric;

final class Area
{
    private $length;
    private $width;

    public static function from(Length $length, Width $width): self
    {
        return new self($length, $width);
    }

    private function __construct(Length $length, Width $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function toSquareMeters(): float
    {
        return $this->length->toMeters() * $this->width->toMeters();
    }
}
