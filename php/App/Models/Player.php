<?php

namespace Joc4enRatlla\Models;


class Player
{
    // Nom del jugador
    private $name;
    // Color de les fitxes
    private $color;
    // Forma de jugar (automàtica/manual)
    private $isAutomatic;
    //Activacion del secretito
    private $secret;

    public function __construct($name, $color, $isAutomatic = false, $secret = false)
    {
        $this->name = $name;
        $this->color = $color;
        $this->isAutomatic = $isAutomatic;
        $this->secret = $secret;
    }

    // Getters i Setters 
    /**
     * Esta funcion de la clase Player retorna el nombre del jugador
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * Esta funcion de la clase Player retorna el color del jugador
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
    /**
     * Esta funcion de la clase Player retorna el modo de juego
     * @return bool
     */
    public function getIsAutomatic(): bool
    {
        return $this->isAutomatic;
    }
    public function getSecret(): bool
    {
        return $this->secret;
    }
}
