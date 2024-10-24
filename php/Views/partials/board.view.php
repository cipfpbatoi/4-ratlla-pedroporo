    <?php

    if ($board->isFull()) {
        echo "<h1>Esto es un empate</h1><br>";
    } else if (!$winner) {
        echo "<table>";
        foreach ($board->getSlots() as $screen => $filas) {
            echo "<tr>";
            foreach ($filas as $columna => $valor) {
                if ($valor == "player1" && $players[1]->getSecret() == true) {
                    echo "<td class='$valor secret tab'><input type='submit'style='opacity: 0;' class='botonOculto' name='columna' value='$columna'></td>";
                } else {
                    echo "<td class='$valor tab'><input type='submit'style='opacity: 0;' class='botonOculto' name='columna' value='$columna'></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h1> Gana el jugador " . $winner->getName() . " </h1><br>";
    }
    ?>
