<?php
/**
 * Created by PhpStorm.
 * User: sofiane
 * Date: 16/11/2017
 * Time: 16:40
 */

namespace QuadroGame;

use PHPUnit\Framework\TestCase;
use Exception;


class BoardTest extends TestCase
{

    private $pawn;
    private $sut;

    public function setUp()
    {
        $this->sut = new Board();
        $this->pawn = new Pawn(
            Pawn::COLOR_WHITE,
            Pawn::BODY_HOLE,
            Pawn::SHAPE_SQUARE,
            Pawn::NULL
        );
    }

    public function test_it_inserts_new_pawn(){
        $this->sut->add(
            2,
            3,
            $this->pawn
        );
        $this->assertEquals(
            $this->sut->lines()[2][3],
            $this->pawn
        );
    }

    /**
     * @expectedException Exception
     */
    public function test_it_throw_an_exception_if_a_placement_is_already_taken()
    {
        $this->sut->add(
            2,
            3,
            $this->pawn
        );

        $this->sut->add(
            2,
            3,
            $this->pawn
        );
    }

    public function test_it_declare_one_combination_victorious()
    {
        $this->sut->add(
            1,
            3,
            $this->pawn
        );
        $this->sut->add(
            2,
            3,
            $this->pawn
        );
        $this->sut->add(
            3,
            3,
            $this->pawn
        );
        $this->sut->add(
            4,
            3,
            $this->pawn
        );

        $this->assertTrue(
            $this->sut->checkVictory()
        );
    }

    public function test_it_has_failed()
    {
        $this->assertFalse($this->sut->checkVictory());
    }

}
