<?php

namespace QuadroGame;


final class Pawn
{
    private $color;
    private $hole;
    private $shape;
    private $size;


    const BLACK = 'black';
    const HOLE = 'hole';
    const SQUARE = 'square';
    const TALL = 'tall';
    const NULL = null;

    public function __construct($color, $hole, $shape, $size)
    {
        $this->color = $color;
        $this->hole = $hole;
        $this->shape;
    }

    public function color()
    {
        return $this->color;
    }

    public function properties()
    {
        return [
            $this->color,
            $this->hole,
            $this->shape,
            $this->size,
        ];
    }

    public function exists()
    {
        $activeProperties = array_filter(
            $this->properties(),
            function($property)
            {
                return $property != Pawn::NULL;
            }
        );

        return count($activeProperties) > 0;
    }
}
