<?php

namespace Joc4enRatlla\Controllers;

use PDO;
use Joc4enRatlla\DB\Conexion;

class AuthController
{
    private $tablaUsuaris = "usuaris";
    private Conexion $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }
    private function getUser(string $nombre) {
        $sql = "SELECT * FROM $this->tablaUsuaris WHERE nom_usuari=:name";
        $sentencia = $this->conexion->pdo->prepare($sql);
        $sentencia->bindParam(':name', $nombre);
        $sentencia->setFetchMode(PDO::FETCH_OBJ);
        $sentencia->execute();
        return $sentencia->fetch();
    }
    public function login(string $nombre, string $password, bool $remember)
    {
        
        $user = $this->getUser($nombre);
        
        if (!$user) {
            $this->register($nombre,$password);
            $user = $this->getUser($nombre);
        }
        if (isset($user) && password_verify($password, $user->contrasenya)) {
            if (!isset($_COOKIE['id_usuari']) && $remember) {
                setcookie("id_usuari", $user->id);
            }
            $_SESSION['id_usuari'] = $user->id;
            header("Location: /");
        } else {
            echo "Invalid password.";
        }
    }
    private function register(string $nombre, string $password) {
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->tablaUsuaris (nom_usuari, contrasenya) VALUES (
        :name,
        :pass
      )";
        $sentencia = $this->conexion->pdo->prepare($sql);
        $sentencia->bindParam(':name', $nombre);
        $sentencia->bindParam(':pass', $passHash);
        return $sentencia->execute();
    }
}
