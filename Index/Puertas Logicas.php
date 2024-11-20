<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puertas Lógicas</title>
</head>
<body>
    <h1> Operadores Lógicos</h1>
    <p>Ejemplo de fichaje de jugador</p>
    <hr>

    <h2>inscripcion para jugar </h2>
    <h3>Ingresa tus datos de jugador</h3>

    <form action="puertas logicas.1.php" method="post">
        <label>Edad:</label><br>
        <input type="number" name="edad" required><br>

        <label>Altura en cm:</label><br>
        <input type="number" name="Altura" required><br>

        <label>Complexión:</label><br>
        <select name="complexion" required>
            <option value="delgado">Delgado</option>
            <option value="Robusto">Robusto</option>
            <option value="esbelto">Esbelto</option>
        </select><br>

        <label>Posición:</label><br>
        <select name="Posicion" required>
            <option value="Delantero">Delantero</option>
            <option value="Medio centro">Medio centro</option>
            <option value="Defensa">Defensa</option>
            <option value="Lateral derecho">Lateral derecho</option>
        </select>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
