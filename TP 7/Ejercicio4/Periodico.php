<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodico</title>
</head>
<body>
    <h1>Seleccione titulo</h1>
    <?php
        if(!isset($_COOKIE['titular'])){
    ?>
            <form method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <input type='radio' name='pol'>Noticia Política
                    <br>
                    <input type='radio' name='ec'>Noticia Económica
                    <br>
                    <input type='radio' name='dep'>Noticia Deportiva
                    <br><br>
                    <input type='submit' name='seleccionar' value='Seleccionar'>
            </form>
    <?php 
            if(isset($_POST['pol'])){
                if($_POST['pol'] == 'on'){
                    setcookie("titular","Noticia Política", time()+3600*24*60);
                }
            }
            if(isset($_POST['ec'])){
                if($_POST['ec'] == 'on'){
                    setcookie("titular","Noticia Económica", time()+3600*24*60);
                }
            }
            if(isset($_POST['dep'])){
                if($_POST['dep'] == 'on'){
                    setcookie("titular","Noticia Deportiva", time()+3600*24*60);
                }
            }
        }else{
            echo "<h1>$_COOKIE[titular]</h1>";
        }
        echo "<br> <a href='Borrar.php'>Borrar cookie</a>"
    ?> 
</body>
</html>