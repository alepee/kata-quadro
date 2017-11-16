<?php

namespace FabricShop\Fabric;

const ONE_INCH_IN_METERS = 0.0254;

final class Width
{

    private $meters;

    public static function fromMeters(float $meters): self
    {
        return new self($meters);
    }

    public static function fromInches(float $inches): self
    {
        return new self($inches * ONE_INCH_IN_METERS);
    }

    private function __construct(float $meters)
    {
        $this->meters = $meters;
    }

    public function toMeters(): float
    {
        return $this->meters;
    }
}
