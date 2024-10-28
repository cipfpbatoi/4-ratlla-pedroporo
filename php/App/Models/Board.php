<?php

namespace Joc4enRatlla\Models;

use Joc4enRatlla\Excemptions\FichaFueraDeRango;

class Board
{
    /**
     * El numnero de filas que va a tener
     * @var int
     */
    public const FILES = 6;
    /**
     * El numero de columnas que se va a tener
     * @var int
     */
    public const COLUMNS = 7;
    /**
     * Parametro que inicia cual es la casilla vacia
     * @var string
     */
    public const CASILLAVACIA = 'buid';
    /**
     * El numero de fichas seguidas para poder ganar
     * @var int
     */
    public const NUMFICHASGANAR = 4;
    public const DIRECTIONS = [
        [0, 1],   // Horizontal derecha
        [1, 0],   // Vertical abajo
        [1, 1],   // Diagonal abajo-derecha
        [1, -1]   // Diagonal abajo-izquierda
    ];
    /**
     * Variable del array del juego
     * @var array
     */
    private array $slots;
    /**
     * inicializa la pantalla
     */
    public function __construct()
    {

        $this->slots = $this->initializeBoard();
    }

    // Getters i Setters 
    public function getSlots(): array
    {
        return $this->slots;
    }
    /**
     * Permite remplazar la pantalla con los valores seleccionados 
     * @param array $slots
     * @return void
     */
    public function setSlots(array $slots): void
    {
        $this->slots = $slots;
    }
    /**
     * Inicia la pantalla con valores vacios
     *
     * @return array
     */
    private static function initializeBoard(): array
    {
        $filas = self::FILES;
        $columnas = self::COLUMNS;
        $array = [];
        for ($i = 1; $i <= $filas; $i++) {
            $fila = [];
            for ($a = 1; $a <= $columnas; $a++) {
                $fila[$a] = self::CASILLAVACIA;
            }
            $array[$i] = $fila;
        }
        return $array;
    }
    /**
     * Realiza un movimiento en la pantalla y la retorna
     *
     * @param integer $column
     * @param integer $player
     * @return array
     */
    public function setMovementOnBoard(int $column, int $player): array
    {
        if ($this->isValidMove($column)) {
            for ($i = count($this->slots); $i >= 1; $i--) {
                if ($this->slots[$i][$column] === self::CASILLAVACIA) {
                    $this->slots[$i][$column] = "player$player";
                    return $this->slots;
                }
            }
        }
        return $this->slots;
    }
    /**
     * Comprueba si hay un ganador
     *
     * @param array $coord
     * @param integer $player
     * @param integer $columna
     * @return boolean
     */
    public function checkWin(array $coord, int $player, int $columna): bool
    {
        $jugador = "player$player";
        if (self::comprobarHorizontal($coord, $jugador, $columna) || self::comprobarVertical($coord, $jugador, $columna) || self::comprobarInclinadaDerecha($coord, $jugador, $columna) || self::comprobarInclinadaIzquierda($coord, $jugador, $columna)) {
            return true;
        }
        return false;
    }
    /**
     * Recibe la pantalla actual, el jugador que a realizado el ultimo movimiento y la columna en la que ha hecho ese ultimo movimiento de forma que este inclinada hacia la izquierda
     * @param mixed $pantalla
     * @param mixed $jugador
     * @param mixed $columna
     * @return bool
     */
    private function comprobarInclinadaIzquierda($pantalla, $jugador, $columna)
    {
        $fichasSeguidas = 1;
        $ultimaFila = self::comprobarUltimaFilaDeColumna($pantalla, $columna);

        for ($i = 1; $i <= self::FILES; $i++) {
            if ($columna - $i >= 1 && $ultimaFila - $i >= 1 && $pantalla[$ultimaFila - $i][$columna - $i] === $jugador) {
                $fichasSeguidas++;
            } else {
                break;
            }
        }
        for ($i = 1; $i <= self::FILES; $i++) {
            if ($columna + $i <= self::COLUMNS && $ultimaFila + $i <= self::FILES && $pantalla[$ultimaFila + $i][$columna + $i] === $jugador) {
                $fichasSeguidas++;
            } else {
                break;
            }
        }
        return self::checkNumFichas($fichasSeguidas);
    }
    /**
     * Recibe la pantalla actual, el jugador que a realizado el ultimo movimiento y la columna en la que ha hecho ese ultimo movimiento de forma que este inclinada hacia la derecha
     * @param mixed $pantalla
     * @param mixed $jugador
     * @param mixed $columna
     * @return bool
     */
    private function comprobarInclinadaDerecha($pantalla, $jugador, $columna)
    {
        $fichasSeguidas = 1;
        $ultimaFila = self::comprobarUltimaFilaDeColumna($pantalla, $columna);

        //echo " $ultimaFila $columna";
        for ($i = 1; $i <= self::FILES; $i++) {
            if ($columna - $i >= 1 && $ultimaFila + $i <= self::FILES && $pantalla[$ultimaFila + $i][$columna - $i] === $jugador) {
                $fichasSeguidas++;
            } else {
                break;
            }
        }
        for ($i = 1; $i <= self::FILES; $i++) {
            if ($columna + $i <= self::FILES && $ultimaFila - $i >= 1 && $pantalla[$ultimaFila - $i][$columna + $i] === $jugador) {
                $fichasSeguidas++;
            } else {
                break;
            }
        }
        return self::checkNumFichas($fichasSeguidas);
    }
    /**
     * Recibe la pantalla actual, el jugador que a realizado el ultimo movimiento y la columna en la que ha hecho ese ultimo movimiento de forma vertical
     * @param mixed $pantalla
     * @param mixed $jugador
     * @param mixed $columna
     * @return bool
     */
    private function comprobarVertical($pantalla, $jugador, $columna)
    {
        $fichasSeguidas = 0;


        for ($i = count($pantalla); $i >= 1; $i--) {
            if ($pantalla[$i][$columna] == $jugador) {
                $fichasSeguidas++;
            } else {
                $fichasSeguidas = 0;
            }
            if ($fichasSeguidas === self::NUMFICHASGANAR) {
                return true;
            }
        }

        return false;
    }
    /**
     * Recibe la pantalla actual, el jugador que a realizado el ultimo movimiento y la columna en la que ha hecho ese ultimo movimiento de forma horizontal
     * @param mixed $pantalla
     * @param mixed $jugador
     * @param mixed $columna
     * @return bool
     */
    private function comprobarHorizontal($pantalla, $jugador, $columna)
    {
        $ultimaFila = self::comprobarUltimaFilaDeColumna($pantalla, $columna);
        $fichasSeguidas = 1;
        for ($b = $columna + 1; $b <= self::COLUMNS; $b++) {
            if ($pantalla[$ultimaFila][$b] === $jugador) {
                $fichasSeguidas++;
            } else {
                break;
            }
        }

        for ($i = $columna - 1; $i >= 1; $i--) {
            if ($pantalla[$ultimaFila][$i] === $jugador) {
                $fichasSeguidas++;
            } else {
                break;
            }
        }
        return self::checkNumFichas($fichasSeguidas);
    }
    /**
     * Retorna la ultima posicion disponible vacia de una columna
     * @param mixed $pantalla
     * @param mixed $columna
     * @return int
     */
    private function comprobarUltimaFilaDeColumna($pantalla, $columna)
    {
        for ($i = count($pantalla); $i >= 1; $i--) {
            if ($pantalla[$i][$columna] === self::CASILLAVACIA) {
                return $i + 1;
            }
        }
        return 1;
    }
    /**
     * Comprueba que el numero de fichas seguidas es mayor o igual al numero de fichas necesarias para ganar
     * @param mixed self::NUMFICHASGANAR
     * @param mixed $fichas
     * @return bool
     */
    private function checkNumFichas($fichas)
    {
        if ($fichas >= self::NUMFICHASGANAR) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Comprova si hi ha empate
     *
     * @return boolean
     */
    public function isFull(): bool
    {
        if (in_array(self::CASILLAVACIA, $this->slots[1])) {
            return false;
        } else {
            return true;
        }
    }
    /**
     * Comprova si el moviment és vàlid
     *
     * @param integer $column
     * @return boolean
     */
    public function isValidMove(int $column): bool
    {
        for ($i = count($this->slots); $i >= 1; $i--) {
            if ($this->slots[$i][$column] === 'buid') {
                return true;
            }
        }

        return false;
    }
}
