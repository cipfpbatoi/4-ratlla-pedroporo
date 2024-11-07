<?php
// Recuperamos la información de la sesión
session_start();
setcookie('id_usuari', "", 1);
// Y la destruimos
session_destroy();
header("Location: /");
