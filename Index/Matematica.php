<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matemática</title>
</head>
<body>
<?php
$resultado = ''; // Inicializamos la variable del resultado


if (!empty($_POST['numero1']) && !empty($_POST['numero2'])) {
    $num1 = floatval($_POST['numero1']); 
    $num2 = floatval($_POST['numero2']); 
    $resultado = $num1 + $num2; 
}
?>

<form action="Matematica.php" method="POST">
    <h4>Escribe el primer número:</h4>
    <input type="number" name="numero1" required>
    
    <h4>Escribe el segundo número:</h4>
    <input type="number" name="numero2" required>
    
    <br><br>
    <button type="submit">Sumar</button>
</form>

<br><br>
<?php
if ($resultado !== '') {
    echo "La suma es: " . number_format($resultado, 2); 
}
?>
</body>
</html>
