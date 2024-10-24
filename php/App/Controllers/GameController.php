<?php

namespace Joc4enRatlla\Controllers;

use Joc4enRatlla\Models\Player;
use Joc4enRatlla\Models\Game;


class GameController
{
    private Game $game;

    // Request és l'array $_POST
    public function __construct($request = null)
    {
        //Inicialització del joc
        if (!isset($_SESSION["game"])) {
            $player1 = new Player($request["name"], $request["color"], false, $request["secret"] ?? false);
            $player2 = new Player("Bot", "yellow", true, false);
            $this->game = new Game($player1, $player2);
        } else {
            $this->game = Game::restore();
        }
        $this->play($request);
    }

    public function play(array $request)
    {
        // Gestió del joc
        if (isset($request["columna"])) {
            $this->game->play($request["columna"]);
        } else if (isset($request["exit"])) {
            $this->game->reset();
            session_destroy();
            header("Location: ./");
        } else if (isset($request["reset"])) {
            $this->game->reset();
        }
        
        if ($this->game->getCurrPlayer()->getIsAutomatic()) {
            $this->game->playAutomatic();
        }
        $this->game->save();

        $board = $this->game->getBoard();
        $players = $this->game->getPlayers();
        $winner = $this->game->getWinner();
        $scores = $this->game->getScores();

        loadView('index', compact('board', 'players', 'winner', 'scores'));
    }
}
