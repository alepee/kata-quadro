<?php

namespace FabricShop;

use FabricShop\Fabric\Area;
use FabricShop\Fabric\Length;
use FabricShop\Fabric\Width;

/*final*/ class Fabric
{
    private $premium;
    private $with_patterns;
    private $width;

    public function __construct(bool $premium, bool $with_patterns, Width $width = null)
    {
        $this->premium = $premium;
        $this->with_patterns = $with_patterns;
        $this->width = $width ?: Width::fromMeters(1.5);
    }

    public function priceForLength(Length $length): Price
    {
        return $this->priceForArea(Area::from($length, $this->width));
    }

    private function priceForArea(Area $area): Price
    {
        return $this->pricePerSquareMeter()->multiply($area->toSquareMeters());
    }

    private function pricePerSquareMeter(): Price
    {
        $price = $this->with_patterns
            ? Price::fromCents(600)
            : Price::fromCents(400)
            ;
        return $this->premium ? $price->multiply(1.1) : $price;
    }
}
