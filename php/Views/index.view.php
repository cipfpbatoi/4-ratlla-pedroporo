<html>

<head>
    <link rel="stylesheet" href="4ratlla.css?v=<?php echo time(); ?>">
    <title>4 en ratlla</title>
    <style>
        .player1 {
            background-color: <?= $players[1]->getColor() ?>;
            /* Color vermell per un dels jugadors */
        }

        .player2 {
            background-color: <?= $players[2]->getColor() ?>;
            /* Color groc per l'altre jugador */
        }
    </style>
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/../Views/partials/error.view.php'  ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/../Views/partials/board.view.php'  ?>
        <input type="submit" name="reset" value="Reiniciar joc">
        <input type="submit" name="exit" value="Acabar joc" style="--c:#E95A49"><br>
        <input type="submit" name="save" value="Guardar Partida" style="--c:#25be28"><br>
        <input type="submit" name="load" value="Cargar Partida" style="--c:#bebe25"><br>
        <input type="submit" name="logout" value="Cerrar Session" style="--c:#000000">
    </form>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/../Views/partials/panel.view.php'  ?>
    <script src="script.js"></script>
</body>

</html>