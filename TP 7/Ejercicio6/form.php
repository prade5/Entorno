<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <fieldset>
            <label for="mail">Mail: </label> <input type="mail" name="mail"> <br> <br>
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form>
    <?php
        session_start();
        $link = mysqli_connect("localhost", "root","") or die ("Problemas de conexión a la base de datos");
        mysqli_select_db($link, "base2") or die(mysqli_error($link));
        if(isset($_POST['enviar'])){
            $result = mysqli_query($link,"SELECT nombre FROM alumnos WHERE mail = '$_POST[mail]'") or die(mysqli_error());
            $nombre = mysqli_fetch_assoc($result);
            if($nombre != null){$_SESSION['nombre'] = $nombre['nombre'];}
            else{$_SESSION['nombre'] = null;}
            echo "<p>Correo guardado</p>";
        }
        if(isset($result)){
        mysqli_free_result($result);
        }
        mysqli_close($link);
    ?>
    <br> <br>
    <a href="manejar.php">Bienvenida</a>
</body>
</html>