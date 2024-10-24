<?php

namespace Joc4enRatlla\Excemptions;

use Exception;

class FichaFueraDeRango extends Exception
{
    public function __construct($msj, $codigo = 0, Exception $previa = null)
    {
        // código propio
        parent::__construct($msj, $codigo, $previa);
    }
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
