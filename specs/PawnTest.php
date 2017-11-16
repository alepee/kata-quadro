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
            Pawn::COLOR_BLACK,
            Pawn::BODY_HOLE,
            Pawn::SHAPE_SQUARE,
            Pawn::SIZE_TALL
        );

        $this->assertEquals($sut->color(), Pawn::COLOR_BLACK);
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
            Pawn::COLOR_BLACK,
            Pawn::BODY_HOLE,
            Pawn::SHAPE_SQUARE,
            Pawn::SIZE_SHORT
        );

        $secondPawn = new Pawn(
            Pawn::COLOR_WHITE,
            Pawn::BODY_HOLE,
            Pawn::SHAPE_ROUND,
            Pawn::SIZE_SHORT
        );

        $thirdPawn = new Pawn(
            Pawn::COLOR_BLACK,
            Pawn::BODY_SOLID,
            Pawn::SHAPE_ROUND,
            Pawn::SIZE_SHORT
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
            Pawn::SIZE_SHORT
        );

        $this->assertEquals($sut, $expectedPawn);
    }
}
