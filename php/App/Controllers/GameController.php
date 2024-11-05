<?php

namespace Joc4enRatlla\Controllers;

use Joc4enRatlla\Models\Player;
use Joc4enRatlla\Models\Game;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\JsonFormatter;
use Joc4enRatlla\Exceptions\FichaFueraDeRango;
use PDO;
use Joc4enRatlla\DB\Conexion;
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
            $this->game->save();
        } else {
            $this->game = Game::restore();
        }
        dd($request,$_SESSION);
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
            /**
             * Gestor de accion para poner ficha
             */
            if (isset($request["columna"])) {
                $this->game->play($request["columna"]);
                $log->info('Un jugador a hecho un movimiento a la columna', $request);
            }
            /**
             * Gestor de accion para cerrar por completo el juego
             */
            if (isset($request["exit"])) {
                $log->warning("Se ha cerrado el juego con esta tabla", $this->game->getBoard()->getSlots());
                $this->game->reset();
                header("Location: ./logout.php");
            }
            /**
             * Gestor de accion para reiniciar el tablero
             */
            if (isset($request["reset"])) {
                $log->warning("Se ha cerrado el juego con esta tabla", $this->game->getBoard()->getSlots());
                $this->game->reset();
            }
            /**
             * Gestor de accion para guardar el estado actual de la partida en la base de datos
             */
            if (isset($request["save"])) {
                $this->game->save();
            }
            /**
             * Gestor de accion para cargar el estado actual de la partida de la base de datos
             */
            if (isset($request["load"])) {
            }
            
            /**
             * Accion del bot automatico
             * todo: El profe ha dicho que no se hace
             */
            if ($this->game->getCurrPlayer()->getIsAutomatic()) {
                $this->game->playAutomatic();
            }
        } catch (FichaFueraDeRango $e) {
            $errors[] = $e;
        } finally {
            //$this->game->save();
            $board = $this->game->getBoard();
            $players = $this->game->getPlayers();
            $winner = $this->game->getWinner();
            $scores = $this->game->getScores();


            $log->pushHandler($rfh);

            loadView('index', compact('board', 'players', 'winner', 'scores', 'errors'));
        }
    }
}
