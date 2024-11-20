<?php
if ($_POST) { 
    $cant = intval($_POST['cantidad']); 
    $j = 1;
    $suma = 0;


    while ($j <= $cant) {
        $suma += floatval($_POST["nota$j"]); 
        $j++;
    }


    $prom = $suma / $cant;
    print "Nota final es de : " . number_format($prom, 2); 
} else {
    print "Acceso no permitido.";
}
?>
<br>
<a href="Estadistica4.php">Volver</a>
