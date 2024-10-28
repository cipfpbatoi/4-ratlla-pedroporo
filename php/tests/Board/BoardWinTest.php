<?php

use Joc4enRatlla\Models\Board;
use PHPUnit\Framework\TestCase;

class BoardWinTest extends TestCase
{
    public function testWinPlayer1Vartical()
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
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),1,7));
    }
    public function testWinPlayer2Vartical()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player2',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player2',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player2',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player2',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player2',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'player2',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),2,7));
    }
    public function testWinPlayer1Horizontal()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'buid', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),1,2));
    }
    public function testWinPlayer2Horizontal()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'player2', "3" => 'player2', "4" => 'player2', "5" => 'player2', "6" => 'buid', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'buid', "6" => 'buid', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),2,2));
    }
    public function testWinPlayer1InclinadaDerecha()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'player1', "4" => 'player2', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'player1', "3" => 'player2', "4" => 'player2', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "6" => ["1" => 'player1', "2" => 'player2', "3" => 'player2', "4" => 'player2', "5" => 'buid', "6" => 'buid', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),1,3));
    }
    public function testWinPlayer1InclinadaIzquierda()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player1', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player2', "5" => 'player1', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player2', "5" => 'player2', "6" => 'player1', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player2', "5" => 'player2', "6" => 'player2', "7" => 'player1',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),1,4));
    }
    public function testWinPlayer2InclinadaDerecha()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'player2', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'buid', "2" => 'buid', "3" => 'buid', "4" => 'player2', "5" => 'player1', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'buid', "2" => 'buid', "3" => 'player2', "4" => 'player1', "5" => 'player1', "6" => 'buid', "7" => 'buid',],
            "6" => ["1" => 'buid', "2" => 'player2', "3" => 'player1', "4" => 'player1', "5" => 'player1', "6" => 'buid', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),2,4));
    }
    public function testWinPlayer2InclinadaIzquierda()
    {
        $gameBoard = new Board();
        $arraySup = [
            "1" => ["1" => 'player2', "2" => 'buid', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "2" => ["1" => 'player1', "2" => 'player2', "3" => 'buid', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "3" => ["1" => 'player1', "2" => 'player1', "3" => 'player2', "4" => 'buid', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "4" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player2', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "5" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'buid', "6" => 'buid', "7" => 'buid',],
            "6" => ["1" => 'player1', "2" => 'player1', "3" => 'player1', "4" => 'player1', "5" => 'buid', "6" => 'buid', "7" => 'buid',]
        ];
        $gameBoard->setSlots($arraySup);
        $this->assertTrue($gameBoard->checkWin($gameBoard->getSlots(),2,1));
    }
    
}
