<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptar</title>
</head>

<body>
    <form action="desencriptacion.php" method="POST">
        <label for="dato">DATO: </label><input type="text" name="dato" id="dato">
        <input type="submit" name="desencriptar" value="desencriptar">
    </form>
    <?php
    $clave = "m3m0c0d3";

function encrypt($string, $key)
{
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function decrypt($string, $key)
{
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

if (isset($_POST["encriptar"])) {
    $dato = $_POST["dato"];
    echo $resultado = encrypt($dato, $clave);
} elseif (isset($_POST["desencriptar"])) {
    $dato = $_POST["dato"];
    echo $resultado = decrypt($dato, $clave);
}

?>
</body>

</html>