<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
    <?php
    session_start();

    // Inicializar la sesión si no existe
    if (!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = array();
    }

    // Insertar nuevo usuario
    if (isset($_POST['insertar'])) {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $imagen = $_POST['imagen'];
        $descripcion = $_POST['descripcion'];

        if (empty($dni) || empty($nombre) || empty($correo) || empty($imagen) || empty($descripcion)) {
            echo "Rellena todos los campos.";
        } else {
            $usuario = array(
                "dni" => $dni,
                "nombre" => $nombre,
                "correo" => $correo,
                "imagen" => $imagen,
                "descripcion" => $descripcion
            );

            if (isset($_SESSION['usuario'][$dni])) {
                echo "Se ha modificado el usuario con DNI: " . $dni . "<br>";
            } else {
                echo "Se ha insertado la siguiente información:<br>";
            }

            $_SESSION['usuario'][$dni] = $usuario;
        }
    }

    // Vaciar usuarios seleccionados
    if (isset($_POST['vaciar'])) {
        if (!isset($_POST['dnis'])) {
            echo "no se ah escrito ningun tipo de informacion.";
        } else {
            $dnis = $_POST['dnis'];

            foreach ($dnis as $dni) {
                unset($_SESSION['usuario'][$dni]);
            }
            echo "Información seleccionada borrada correctamente.";
        }
    }

    // Borrar toda la información
    if (isset($_POST['borrar_todo'])) {
        $_SESSION['usuario'] = array();
        echo "Se ha borrado toda la información almacenada.";
    }

    // Volcar la información a un archivo
    if (isset($_POST['volcar'])) {
        if (count($_SESSION['usuario']) === 0) {
            echo "No hay datos para volcar.";
        } else {
            $archivo = fopen("usuarios_volcados.txt", "w");
            foreach ($_SESSION['usuario'] as $usuario) {
                $linea = "DNI: " . $usuario['dni'] . ", Nombre: " . $usuario['nombre'] . ", Correo: " . $usuario['correo'] . ", Imagen: " . $usuario['imagen'] . ", Descripción: " . $usuario['descripcion'] . "\n";
                fwrite($archivo, $linea);
            }
            fclose($archivo);
            echo "Información volcada a 'usuarios_volcados.txt'.";
        }
    }

    // Mostrar usuarios
    if (isset($_POST['mostrar'])) {
        if (count($_SESSION['usuario']) === 0) {
            echo "<p>No hay datos almacenados.</p>";
        } else {
            echo "<form method='post'>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Seleccionar</th>";
            echo "<th>DNI</th>";
            echo "<th>Nombre</th>";
            echo "<th>Correo</th>";
            echo "<th>Imagen</th>";
            echo "<th>Descripción</th>";
            echo "</tr>";

            foreach ($_SESSION['usuario'] as $key => $value) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='dnis[]' value='" . $key . "'></td>";
                echo "<td>" . htmlspecialchars($value['dni']) . "</td>";
                echo "<td>" . htmlspecialchars($value['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($value['correo']) . "</td>";
                echo "<td>" . htmlspecialchars($value['imagen']) . "</td>";
                echo "<td>" . htmlspecialchars($value['descripcion']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><button type='submit' name='vaciar'>Borrar seleccionados</button>";
            echo "</form>";
        }
    }
    ?>
    <!-- Formulario -->
    <form method="post">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <br /><br />

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br /><br />

        <label for="correo">Correo:</label>
        <input type="text" id="correo" name="correo" required>
        <br /><br />

        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen" required>
        <br /><br />

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
        <br /><br />

        <button type="submit" name="insertar">Insertar</button>
        <button type="submit" name="mostrar">Mostrar</button>
        <button type="submit" name="vaciar">Vaciar seleccionados</button>
        <button type="submit" name="borrar_todo">Borrar toda la información</button>
        <button type="submit" name="volcar">Volcar a archivo</button>
    </form>
</body>
</html>
