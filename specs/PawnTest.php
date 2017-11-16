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

    public function test_it_wont_have_any_color()
    {
        $sut = new Pawn(
            Pawn::NULL,
            Pawn::NULL,
            Pawn::NULL,
            Pawn::NULL
        );

        $this->assertEquals($sut->color(), Pawn::NULL);
    }

    public function test_it_wont_exists_when_is_has_not_any_properties()
    {
        $sut = new Pawn(
            Pawn::NULL,
            Pawn::NULL,
            Pawn::NULL,
            Pawn::NULL
        );

        $this->assertFalse($sut->exists());
    }
}
