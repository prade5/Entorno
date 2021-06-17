<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Catalogo</title>
    <?php
        session_start();
        $link = mysqli_connect("localhost","root",'');
        mysqli_select_db($link,"Compras"); 
        if(isset($_SESSION['carro']))
            $carro = $_SESSION['carro'];
        else 
            $carro = false; 
        $qry = mysqli_query($link, "select * from catalogo order by producto asc");
    ?>
    <style>
        .col-6, td, tr{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <table class = "table table-dark table-striped">
            <thead>
                <th scope="col"><strong>Producto</strong></th>
                <th scope="col"><strong>Precio</strong></th>
                <th scope="col"><a href="vercarrito.php?<?php echo SID ?>"title="Ver el contenido del carrito"><button type="button" class="btn btn-primary col-4">Ver carrito</button></a></th>
            </thead>
            <tbody> 
            <?php 
            while($row  = mysqli_fetch_assoc($qry)){ ?>
                <tr>
                    <th scope="row"><?php echo $row['producto'] ?></th>
                    <td><?php echo $row['precio'] ?></td>
                    <td>
                    <?php
                    if(!$carro || !isset($carro[md5($row['id'])]['identificador']) || $carro[md5($row['id'])]['identificador'] != md5($row['id'])){ ?>
                        <a href="agregacar.php?<?php echo SID ?>&id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success col-4">Agregar al carrito</button></a>
                        <?php
                    }
                    else{?>
                        <a href="borracar.php?<?php echo SID ?>&id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger col-4">Remover del carrito</button></a>
                    <?php
                    }?>
                    </td>
                <tr>
                <?php
            }?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>