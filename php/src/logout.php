<?php
// Recuperamos la información de la sesión
session_start();
setcookie('nom_usuari', "", 1);
// Y la destruimos
session_destroy();
header("Location: /");
