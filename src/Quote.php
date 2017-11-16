<?php

namespace FabricShop;

use FabricShop\Fabric\Length as FabricLength;

final class Quote
{
    private $lines = [];

    public function append(Fabric $fabric, FabricLength $length): void
    {
        $this->lines[] = new QuoteLine($fabric, $length);
    }

    public function total(): Price
    {
        return array_reduce(
            $this->lines,
            function(Price $sub_total, QuoteLine $line): Price
            {
                return $sub_total->add($line->price());
            },
            Price::fromCents(0)
        );
    }
}
