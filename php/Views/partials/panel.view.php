<?php
echo "<table>";
echo "<thead>";
echo "<th>Jugador</th>";
echo "<th>Puntos</th>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td>" . $players[1]->getName() . "</td>";
echo "<td>" . $scores[1] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>" . $players[2]->getName() . "</td>";
echo "<td>" . $scores[2] . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
