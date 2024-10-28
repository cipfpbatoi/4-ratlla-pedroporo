<?php

namespace Joc4enRatlla\Controllers;

use Joc4enRatlla\Models\Player;
use Joc4enRatlla\Models\Game;
use Joc4enRatlla\Excemptions;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\JsonFormatter;
use Exception;
use Joc4enRatlla\Excemptions\FichaFueraDeRango;

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

    /**
     * Esta funcion
     *
     * @param array $request
     * 
     */
    public function play(array $request)
    {
        $log = new Logger("GameLogger");
        $rfh = new RotatingFileHandler("../logs/game.log", Logger::DEBUG);
        $rfh->setFormatter(new JsonFormatter());
        $log->pushHandler(new StreamHandler("../logs/game.log", Logger::DEBUG));
        $log->pushProcessor(new IntrospectionProcessor());
        $errors = [];
        try {
            // Gestió del joc
            if (isset($request["columna"])) {
                $this->game->play($request["columna"]);
                $log->info('Un jugador a hecho un movimiento a la columna', $request);
            } else if (isset($request["exit"])) {
                $log->warning("Se ha cerrado el juego con esta tabla", $this->game->getBoard()->getSlots());
                $this->game->reset();
                session_destroy();
                header("Location: ./");
            } else if (isset($request["reset"])) {
                $log->warning("Se ha cerrado el juego con esta tabla", $this->game->getBoard()->getSlots());
                $this->game->reset();
            }

            if ($this->game->getCurrPlayer()->getIsAutomatic()) {
                $this->game->playAutomatic();
            }
        } catch (FichaFueraDeRango $e) {
            $errors[] = $e;
        } finally {
            $this->game->save();
            $board = $this->game->getBoard();
            $players = $this->game->getPlayers();
            $winner = $this->game->getWinner();
            $scores = $this->game->getScores();


            $log->pushHandler($rfh);

            loadView('index', compact('board', 'players', 'winner', 'scores', 'errors'));
        }
    }
}
