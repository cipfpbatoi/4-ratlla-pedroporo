<?php
$secret = $_POST['secret'] ?? "";
$color = $_POST['color'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($secret, $color);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seleccion de jugador</title>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">Elije tu nombre</label>
        <input type="text" name="name" id="name" required>
        <label for="color">Elije un color:</label>
        <input type="color" id="color" name="color" value="#ff0000"><br>
        <label for="secret">Secreto?: </label>
        <input type="checkbox" name="secret" id="secret" value="true">
        <input type="submit" value="submit">
    </form>
</body>

</html>