<?php

use Joc4enRatlla\Models\Board;
use PHPUnit\Framework\TestCase;

class BoardPlaceTest extends TestCase
{
    public function testCanPlaceColumn1()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->isValidMove(1));
    }
    public function testCantPlaceColumn1()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'player1', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "2" => ["1" => 'player1', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "3" => ["1" => 'player1', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "4" => ["1" => 'player1', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "5" => ["1" => 'player1', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'player1', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(1));
    }
    public function testCanPlaceColumn2()
    {
        $gameBoard = new Board();
        $this->assertTrue($gameBoard->isValidMove(2));
    }
    public function testCantPlaceColumn2()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'player1', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'player1', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'player1', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'player1', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'player1', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'player1', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(2));
    }
    public function testCanPlaceColumn3()
    {
        $gameBoard = new Board();
        $this->assertTrue($gameBoard->isValidMove(3));
    }
    public function testCantPlaceColumn3()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(3));
    }
    public function testCanPlaceColumn4()
    {
        $gameBoard = new Board();
        $this->assertTrue($gameBoard->isValidMove(4));
    }
    public function testCantPlaceColumn4()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'player1', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(4));
    }
    public function testCanPlaceColumn5()
    {
        $gameBoard = new Board();
        $this->assertTrue($gameBoard->isValidMove(5));
    }
    public function testCantPlaceColumn5()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player1', "6" => 'player1', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player1', "6" => 'player1', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player1', "6" => 'player1', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player1', "6" => 'player1', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player1', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player1', "6" => 'player1', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(5));
    }
    public function testCanPlaceColumn6()
    {
        $gameBoard = new Board();
        $this->assertTrue($gameBoard->isValidMove(6));
    }
    public function testCantPlaceColumn6()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'player1', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(6));
    }
    public function testCanPlaceColumn7()
    {
        $gameBoard = new Board();
        $this->assertTrue($gameBoard->isValidMove(7));
    }
    public function testCantPlaceColumn7()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player1',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertFalse($gameBoard->isValidMove(7));
    }
}
