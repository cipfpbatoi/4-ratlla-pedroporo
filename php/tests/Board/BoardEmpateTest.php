<?php

use Joc4enRatlla\Models\Board;
use PHPUnit\Framework\TestCase;

class BoardEmpateTest extends TestCase
{
    public function testIsFull()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'player1', "7" => 'player1',],
            "2" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'player1', "7" => 'player1',],
            "3" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'player1', "7" => 'player1',],
            "4" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'player1', "7" => 'player1',],
            "5" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'player1', "7" => 'player1',],
            "6" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'player1', "7" => 'player1',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->isFull());
    }
}
