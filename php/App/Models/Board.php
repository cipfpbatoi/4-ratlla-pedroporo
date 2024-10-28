<?php

namespace Joc4enRatlla\Models;

use Joc4enRatlla\Excemptions\FichaFueraDeRango;

class Board
{
    public const FILES = 6;
    public const COLUMNS = 7;
    public const CASILLAVACIA = 'buid';
    public const NUMFICHASGANAR = 4;
    public const DIRECTIONS = [
        [0, 1],   // Horizontal derecha
        [1, 0],   // Vertical abajo
        [1, 1],   // Diagonal abajo-derecha
        [1, -1]   // Diagonal abajo-izquierda
    ];

    private array $slots;

    public function __construct()
    {

        $this->slots = $this->initializeBoard();
    }

    // Getters i Setters 
    public function getSlots(): array
    {
        return $this->slots;
    }
    public function setSlots(array $slots): void
    {
        $this->slots = $slots;
    }
    //Inicialitza la graella amb valors buits
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
    //Realitza un moviment en la graella
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
    //Comprova si hi ha un guanyador
    public function checkWin(array $coord, int $player, int $columna): bool
    {
        $jugador = "player$player";
        if (self::comprobarHorizontal($coord, $jugador, $columna) || self::comprobarVertical($coord, $jugador, $columna) || self::comprobarInclinadaDerecha($coord, $jugador, $columna) || self::comprobarInclinadaIzquierda($coord, $jugador, $columna)) {
            return true;
        }
        return false;
    }
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
    private function comprobarUltimaFilaDeColumna($pantalla, $columna)
    {
        for ($i = count($pantalla); $i >= 1; $i--) {
            if ($pantalla[$i][$columna] === self::CASILLAVACIA) {
                return $i + 1;
            }
        }
        return 1;
    }
    private function checkNumFichas($fichas)
    {
        if ($fichas === self::NUMFICHASGANAR) {
            return true;
        } else {
            return false;
        }
    }
    //Comprova si hi ha empate
    public function isFull(): bool
    {
        if (in_array(self::CASILLAVACIA, $this->slots[1])) {
            return false;
        } else {
            return true;
        }
    }
    //Comprova si el moviment és vàlid
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
