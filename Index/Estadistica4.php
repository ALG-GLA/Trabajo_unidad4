<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
</head>
<body>
    <h1>Formulario de Notas</h1>
    <form action="Estadistica4.php" method="post">
        <p>Escribe la cantidad de notas: 
            <input type="number" name="txtcant" required>
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
    
    <?php
    if ($_POST) {
        $cant = intval($_POST["txtcant"]); 
        $i = 1;

        echo "<h2>Introduce las notas para $cant materias:</h2>";
        echo "<form action='Estadistica1.php' method='post'>";
        echo "<input type='hidden' name='cantidad' value='$cant'>"; 

        while ($i <= $cant) {
            echo "<p>Materia $i: <input type='number' name='nota$i' required></p>";
            $i++;
        }
        
        echo "<p><input type='submit' value='Calcular Nota'></p>";
        echo "</form>";
    }
    ?>
</body>
</html>
