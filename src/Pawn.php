<?php

namespace QuadroGame;


final class Pawn
{
    private $color;
    private $hole;
    private $shape;
    private $size;


    const BLACK = 'black';
    const WHITE = 'white';

    const HOLE = 'hole';
    const SOLID = 'solid';

    const SQUARE = 'square';
    const ROUND = 'round';

    const SHORT = 'short';
    const TALL = 'tall';

    const NULL = null;

    public function __construct($color, $hole, $shape, $size)
    {
        $this->color = $color;
        $this->hole = $hole;
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
