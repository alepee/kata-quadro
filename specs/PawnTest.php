<?php

namespace QuadroGame;

use QuadroGame\Pawn;
use PHPUnit\Framework\TestCase;


class PawnTest extends TestCase
{
    private $sut;

    public function setUp()
    {
    }

    public function test_it_will_be_black()
    {
        $sut = new Pawn(
            Pawn::BLACK,
            Pawn::HOLE,
            Pawn::SQUARE,
            Pawn::TALL
        );

        $this->assertEquals($sut->color(), Pawn::BLACK);
    }
}
