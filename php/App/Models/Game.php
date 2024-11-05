<?php

namespace Joc4enRatlla\Models;

use Joc4enRatlla\Exceptions\FichaFueraDeRango;
use Joc4enRatlla\Models\Board;
use Joc4enRatlla\Models\Player;
use PDO;
use Joc4enRatlla\DB\Conexion;

/**
 * Esta clase manega todo lo que ocurre en el juego
 */

class Game
{
    /**
     * Se declara un tablero
     * @var Board
     */
    private Board $board;
    /**
     * El numero del siguiente jugador, esto va alternando de 1 a 2
     * @var int
     */
    private int $nextPlayer;

    private array $players;
    private ?Player $winner;
    private array $scores = [1 => 0, 2 => 0];
    private Conexion $conexion;
    private $tablaUsuaris = "usuaris";
    private $tablaPartidas = "partides";

    public function __construct(Player $jugador1, Player $jugador2)
    {
        $this->players = [1 => $jugador1, 2 => $jugador2];
        $this->board = new Board();
        $this->nextPlayer = 2;
        $this->conexion = new Conexion();
    }

    // getters i setters
    /**
     * Debuelve el estado actual del tablero
     * @return \Joc4enRatlla\Models\Board
     */
    public function getBoard(): Board
    {
        return $this->board;
    }
    public function setBoard($board): void
    {
        $this->board = $board;
    }
    public function getPlayers(): array
    {
        return $this->players;
    }
    public function getCurrPlayerNum(): int
    {
        return $this->nextPlayer === 1 ? 2 : 1;
    }
    public function getCurrPlayer(): Player
    {
        return $this->players[$this->nextPlayer === 1 ? 2 : 1];
    }
    public function getNextPlayer(): Player
    {
        return $this->players[$this->nextPlayer];
    }
    public function setNextPlayer()
    {
        $this->nextPlayer = $this->nextPlayer === 1 ? 2 : 1;
    }
    public function getWinner(): ?Player
    {
        return $this->winner ?? null;
    }
    public function setWinner($winner)
    {
        $this->winner = $winner;
    }
    public function getScores(): array
    {
        return $this->scores;
    }
    //Reinicia el joc
    public function reset(): void
    {
        unset($this->board);
        unset($this->winner);
        $this->nextPlayer = 2;
        $this->board = new Board();
    }
    //Realitza un moviment
    public function play($columna)
    {
        if (!$this->board->isValidMove($columna)) {
            throw new FichaFueraDeRango("Estas lanzando una ficha en una columna llena");
        }
        $this->board->setMovementOnBoard($columna, $this->getCurrPlayerNum());
        if ($this->board->checkWin($this->board->getSlots(), $this->getCurrPlayerNum(), $columna)) {
            $this->setWinner($this->getCurrPlayer());
            $this->scores[$this->getCurrPlayerNum()]++;
            return;
        }
        $this->setNextPlayer();
    }
    public function playAutomatic()
    {
        $opponent = $this->nextPlayer === 1 ? 2 : 1;

        for ($col = 1; $col <= Board::COLUMNS; $col++) {
            if ($this->board->isValidMove($col)) {
                $tempBoard = clone ($this->board);
                $coord = $tempBoard->setMovementOnBoard($col, $this->nextPlayer);

                if ($tempBoard->checkWin($coord, $this->getCurrPlayerNum(), $col)) {
                    $this->play($col);
                    return;
                }
            }
        }

        for ($col = 1; $col <= Board::COLUMNS; $col++) {
            if ($this->board->isValidMove($col)) {
                $tempBoard = clone ($this->board);
                $coord = $tempBoard->setMovementOnBoard($col, $opponent);
                if ($tempBoard->checkWin($coord, $this->getCurrPlayerNum(), $col)) {
                    $this->play($col);
                    return;
                }
            }
        }

        $possibles = array();
        for ($col = 1; $col <= Board::COLUMNS; $col++) {
            if ($this->board->isValidMove($col)) {
                $possibles[] = $col;
            }
        }
        $random = 0;
        if (count($possibles) > 2) {
            $random = rand(-1, 1);
        }
        $middle = (int) (count($possibles) / 2) + $random;
        $inthemiddle = $possibles[$middle];
        $this->play($inthemiddle);
    }
    //Guarda l'estat del joc a les sessions
    public function save()
    {
        $userLogged = $_COOKIE['nom_usuari'] ?? $_SESSION['nom_usuari'];
        $userId = $this->getUser($userLogged)->id;

        $sql = "SELECT * FROM $this->tablaPartidas WHERE usuari_id=:userId";
        $sentencia = $this->conexion->pdo->prepare($sql);
        $sentencia->bindParam(':userId', $userId);
        $sentencia->setFetchMode(PDO::FETCH_OBJ);
        $sentencia->execute();
        $partida = $sentencia->fetch();
        if (!$partida) {
            $sql = "INSERT INTO $this->tablaPartidas (usuari_id, game) VALUES (
                    :userId,
                    :game
                )";
            //$game=serialize($this);
            $sentencia = $this->conexion->pdo->prepare($sql);
            $sentencia->bindParam(':userId', $userId);
            $sentencia->bindParam(':game', $this);
            $sentencia->execute();
        }

        $_SESSION['game'] = serialize($this);
    }
    //Restaura l'estat del joc de les sessions
    public static function restore()
    {

        return unserialize($_SESSION['game']);
    }
    private function getUser(string $nombre)
    {
        $sql = "SELECT * FROM $this->tablaUsuaris WHERE nom_usuari=:name";
        $sentencia = $this->conexion->pdo->prepare($sql);
        $sentencia->bindParam(':name', $nombre);
        $sentencia->setFetchMode(PDO::FETCH_OBJ);
        $sentencia->execute();
        return $sentencia->fetch();
    }
}
