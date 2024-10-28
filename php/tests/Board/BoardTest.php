<?php

use Joc4enRatlla\Models\Board;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{
    public function testboardInitStatus()
    {
        $gameBoard = new Board();
        $arraySup = ["1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',]];
        $this->assertEquals($arraySup, $gameBoard->getSlots());
    }
    public function testboardMovimentStatus()
    {
        $gameBoard = new Board();
        $arraySup = ["1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',], "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',]];
        $this->assertEquals($arraySup, $gameBoard->setMovementOnBoard(7, 1));
    }
}
