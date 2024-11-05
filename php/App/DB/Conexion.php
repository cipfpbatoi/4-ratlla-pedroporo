<?php
namespace Joc4enRatlla\DB;
use PDO;
use PDOException;
class Conexion
{
    //private $conn = require "./connection.php";
    public $pdo;
    public function __construct()
    {
        $conn= require "connection.php";
        try {
            $dsn = 'mysql:host=' . $conn['host'] . ';dbname=' . $conn['dbname'];
            $usuari = $conn['username'];
            $contrasenya = $conn['password'];
            $this->pdo = new PDO($dsn, $usuari, $contrasenya);
        } catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
            exit();
        }
    }

 
}
