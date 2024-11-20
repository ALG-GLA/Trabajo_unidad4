<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de la Búsqueda</h1>
    <hr>
    <?php

    $edad = $_POST["edad"];
    $Altura = $_POST["Altura"];
    $complexion = $_POST["complexion"];
    $Posicion = $_POST["Posicion"];

    if ($edad >= 25 && $edad < 30 && $Altura >= 175 or $Altura <= 185 && $complexion == "esbelto" 
    && ($Posicion == "Delantero" or $Posicion=="Defensa")) {
        echo "El equipo está interesado en ti.";
    } else {
        echo "El equipo no está interesado.";
    }

    ?>
</body>
</html>

