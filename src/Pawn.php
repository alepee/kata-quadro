<?php

namespace QuadroGame;


final class Pawn
{
    private $color;
    private $hole;
    private $shape;
    private $size;


    const COLOR_BLACK = 'black';
    const COLOR_WHITE = 'white';

    const BODY_HOLE = 'hole';
    const BODY_SOLID = 'solid';

    const SHAPE_SQUARE = 'square';
    const SHAPE_ROUND = 'round';

    const SIZE_SHORT = 'short';
    const SIZE_TALL = 'tall';

    const NULL = null;

    public function __construct($color, $body, $shape, $size)
    {
        $this->color = $color;
        $this->hole = $body;
        $this->shape = $shape;
        $this->size = $size;
    }

    public function color()
    {
        return $this->color;
    }

    public function hole()
    {
        return $this->hole;
    }

    public function shape()
    {
        return $this->shape;
    }

    public function size()
    {
        return $this->size;
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

    function combine(Pawn $otherPawn): Pawn {

        $combinedPawnProperties = [];
        foreach ($this->properties() as $index => $property)
        {
            $combinedPawnProperties[] = (
                $property == $otherPawn->properties()[$index] ? $property : Pawn::NULL
            );
        }

        return new Pawn(...$combinedPawnProperties);
    }
}
