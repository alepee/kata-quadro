<?php

namespace QuadroGame;

use QuadroGame\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    private $sut;

    public function test_a_game_has_four_columns()
    {
        $sut = new Game();

        $this->assertEquals(count($sut->columns), 4);
    }
}
