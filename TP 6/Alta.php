<html>
<head>
    <title>Alta Capital</title>
    <meta charset="ISO-8859-1">
    <meta content-type="text/html">  
</head>
<body>
<?php
include("conexion.inc");
//Captura datos desde el Form anterior
$vCiudad = $_POST['ciudad'];
$vPais = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vTieneMetro = $_POST['tieneMetro'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT Count(pais) as canti FROM ciudades WHERE pais='$vPais'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$vCantCiudades = mysqli_fetch_assoc($vResultado);
if ($vCantCiudades ['canti']!=0){
echo ("El pais ya existe<br>");
echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
}
else {
$vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
values ('$vCiudad','$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
mysqli_query($link, $vSql) or die (mysqli_error($link));
echo("El Pais fue registrado correctamente.<br>");
echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
}
// Cerrar la conexion
mysqli_close($link);
?></body></html>