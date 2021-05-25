<html>
<head>
    <title>Baja</title>
    <meta charset="ISO-8859-1">
    <meta content-type="text/html">  
</head>
<body>
<?php
include ("conexion.inc");
$vId = $_POST ['id'];
$vSql = "SELECT * FROM ciudades WHERE id='$vId' ";
$vResultado = mysqli_query($link, $vSql);
if(mysqli_num_rows($vResultado) == 0)
{
echo ("Pais Inexistente...!!! <br>");
echo ("<A href='FormBajaIni.html'>Continuar</A>");
}
else{
//Arma la instrucción SQL y luego la ejecuta
$vSql= "DELETE FROM ciudades WHERE id = '$vId' ";
mysqli_query($link, $vSql);
echo("El pais fue Borrado<br>");
echo("<A href='Menu.html'>Volver al Menu del ABM</A>");
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>