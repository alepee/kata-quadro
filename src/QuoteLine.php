<?php

namespace FabricShop;

use FabricShop\Fabric\Length as FabricLength;

final class QuoteLine
{
    private $fabric;
    private $length;

    public function __construct(Fabric $fabric, FabricLength $length)
    {
        $this->fabric = $fabric;
        $this->length = $length;
    }

    public function price(): Price
    {
        return $this->fabric->priceForLength($this->length);
    }
}
