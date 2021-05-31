<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['titular'])){
        unset($_COOKIE['titular']);
        setcookie('titular', '', time() - 3600);
        echo "cookie borrada <br>";
        }
        echo "<a href='Periodico.php'>Volver</a>"
    ?>
</body>
</html>
