<?php
if(isset($_POST["estilo"])){
$estilo = $_POST["estilo"];
setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
}else{
if (isset($_COOKIE["estilo"])){
$estilo = $_COOKIE["estilo"];
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Cookies en PHP</title>
<?php
if (isset($estilo)){
echo '<link rel="STYLESHEET" type="text/css" href="' . $estilo . '.css">';
}
?>
</head>
<body>
Ejemplo de uso de cookies en PHP para almacenar la hoja de estilos css 
que queremos utilizar para definir el aspecto de la página.
<p>
<form action="Ejercicio1.php" method="post"> 
Aquí puedes seleccionar el estilo que prefieres en la página:
<br>
<select name="estilo">
<option value="verde">Verde
<option value="rosa">Rosa
<option value="negro">Negro
</select>
<input type="submit" value="Actualizar el estilo">
</form>
</body>
</html>
