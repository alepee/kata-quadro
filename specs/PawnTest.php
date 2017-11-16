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

    public function test_it_can_be_combined_to_another_pawn_and_give_matching_properties()
    {
        $firstPawn = new Pawn(
            Pawn::BLACK,
            Pawn::HOLE,
            Pawn::SQUARE,
            Pawn::SHORT
        );

        $secondPawn = new Pawn(
            Pawn::WHITE,
            Pawn::HOLE,
            Pawn::ROUND,
            Pawn::SHORT
        );

        $thirdPawn = new Pawn(
            Pawn::BLACK,
            Pawn::SOLID,
            Pawn::ROUND,
            Pawn::SHORT
        );

        $line = [
            $firstPawn,
            $secondPawn,
            $thirdPawn
        ];

        $sut = array_reduce(
            $line,
            function($prev, $curr)
            {
                return $prev ? $prev->combine($curr) : $curr;
            }
        );

        $expectedPawn = new Pawn(
            Pawn::NULL,
            Pawn::NULL,
            Pawn::NULL,
            Pawn::SHORT
        );

        $this->assertEquals($sut, $expectedPawn);
    }
}
