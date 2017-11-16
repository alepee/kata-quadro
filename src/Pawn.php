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


}
