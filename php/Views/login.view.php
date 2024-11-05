<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $remember = $_POST['remember'] ?? false;

    $auth->login($nombre, $password, $remember);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        .form {
            --bg-light: #efefef;
            --bg-dark: #707070;
            --clr: #58bc82;
            --clr-alpha: #9c9c9c60;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            width: 100%;
            max-width: 300px;

        }

        .form .input-span {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form input[type="text"],
        .form input[type="password"] {
            border-radius: 0.5rem;
            padding: 1rem 0.75rem;
            width: 100%;
            border: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--clr-alpha);
            outline: 2px solid var(--bg-dark);
        }

        .form input[type="text"]:focus,
        .form input[type="password"]:focus {
            outline: 2px solid var(--clr);
        }

        .label {
            align-self: flex-start;
            font-weight: 600;
        }

        .form .submit {
            padding: 1rem 0.75rem;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 3rem;
            background-color: var(--bg-dark);
            color: var(--bg-light);
            border: none;
            cursor: pointer;
            transition: all 300ms;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form .submit:hover {
            background-color: var(--clr);
            color: var(--bg-dark);
        }

        .span {
            text-decoration: none;
            color: var(--bg-dark);
        }
    </style>
</head>

<body>
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <span class="input-span">
            <label for="nombre" class="label">Introduce tu nombre:</label><br>
            <input type="text" name="nombre" id="nombre"><br>
        </span>
        <span class="input-span">
            <label for="password" class="label">Introduce tu contraseña:</label><br>
            <input type="password" name="password" id="password">
        </span>

        <span class="input-span">
            <label for="remember" class="label">Recordarte?: </label>
            <input type="checkbox" name="remember" id="remember" value="true">
        </span>

        <input class="submit" type="submit" name="login" value="Enviar">
    </form>
    <br>
</body>

</html>