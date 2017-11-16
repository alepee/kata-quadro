<?php

namespace FabricShop\Fabric;

final class Length
{
    private $meters;

    public static function fromMeters(int $meters): self
    {
        return new self($meters);
    }

    private function __construct(int $meters)
    {
        $this->meters = $meters;
    }

    public function toMeters(): int
    {
        return $this->meters;
    }
}
