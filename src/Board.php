<?php

namespace QuadroGame;



use Exception;

class AlreadyTakenException extends Exception
{

}


final class Board
{
    private $board;


    public function __construct() {
        $this->board = [
            [null, null, null, null],
            [null, null, null, null],
            [null, null, null, null],
            [null, null, null, null]
        ];
    }



    public function lines(): array
    {
        return $this->board;
    }

    public function columns(): array
    {
        $columns = [];
        foreach ($this->board as $indexLine => $line) {
            foreach ($line as $indexCol => $item)
            {
                $columns[$indexCol][$indexLine] = $item;
            }
        }

        return $columns;
    }

    public function add(int $x, int $y, Pawn $pawn): void
    {
        if (!empty($this->board[$x][$y]))
        {
            throw new AlreadyTakenException();
        }

        $this->board[$x][$y] = $pawn;
    }
}
