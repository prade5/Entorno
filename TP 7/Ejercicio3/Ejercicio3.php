<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test usuario cookie</title>
</head>
<body>
    <form method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="text" name='usuario'></input>
        <button type='submit' name='enviar' value='enviar'>Enviar</button>
    </form>
    <?php
        $link = mysqli_connect("localhost", "root","") or die ("Problemas de conexión a la base de datos");
        mysqli_select_db($link, "ejercicio3") or die(mysqli_error($link));

        if (isset($_POST['enviar'])){
            if(!isset($_COOKIE['usuario'])){
                setcookie("usuario", $_POST['usuario'] , time()+ 3600*24*60);
                mysqli_query($link, "INSERT INTO usuarios(nombre, fecha) VALUES ('$_POST[usuario]', now())") or die(mysqli_error($link));
            }
        }
        $resultado = mysqli_query($link, "SELECT nombre FROM usuarios WHERE fecha = (SELECT max(fecha) FROM usuarios)") or die(mysqli_error($link));
        $usuario = mysqli_fetch_assoc($resultado);
        if($usuario != null){
            echo "<p>Nombre del último usuario registrado: $usuario[nombre] " .getDate(time())['year']. "</p>";
        }else{
            echo "<p>No se encuentran usuarios</p>";
        }
        mysqli_free_result($resultado);
        mysqli_close($link);
    ?>
</body>
</html>