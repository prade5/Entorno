<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Lista Carrito</title>
    <?php
        session_start();
        $carro=$_SESSION['carro'];
    ?> 
    <style>
        .col-6, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 align="center">Carrito</h1>
    <?php
    if($carro){?>
    <div class="container-fluid">
        <div class="row">
            <table class="table table-dark justify-content-center">
                <thead class="tit">
                    <td >Producto</td>
                    <td >Precio</td>
                    <td >Cantidad de Unidades</td>
                    <td >Modificar</td>
                    <td >Borrar</td>
                    <td >Actualizar</td>
                </thead>
                <tbody>
                    <?php
                    $contador=0;
                    $suma=0;
                    foreach($carro as $k => $v){
                        $subto=$v['cantidad']*$v['precio'];
                        $suma=$suma+$subto;
                        $contador++;
                        ?> 
                        <form name="a<?php echo $v['identificador'] ?>" method="post" action="agregacar.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
                            <tr class="align-center">
                                <td><?php echo $v['producto'] ?></td>
                                <td><?php echo $v['precio'] ?></td>
                                <td><?php echo $v['cantidad'] ?></td>
                                <td>
                                <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad']?>" size="8">
                                <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> 
                                </td>
                                <td><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id']?>"><button type="button" class="btn btn-danger">Borrar</button></a></td>
                                <td><button type="submit" class="btn btn-primary">Actualizar</button></td>
                            </tr>
                        </form>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <span>Total de Artículos: <?php echo count($carro);?></span><br>
                <span>Total: $<?php echo number_format($suma,2);?></span>
            </div>   
            <div class="col-6">       
                <a href="catalogo.php?<?php echo SID;?>"><button type="button" class="btn btn-primary">Volver</button></a>&nbsp;
                <a href="gracias.php?<?php echo SID;?>&costo=<?php echo $suma; ?>"><button type="button" class="btn btn-success">Finalizar compra</button></a>
            </div>
        </div>
        <?php 
        }else{ ?>
            <p align="center"> <span class="prod">No hay productos seleccionados</span> <a href="catalogo.php?<?php echo SID;?>"><img src="continuar.gif" width="13"height="13" border="0"></a>
            <?php 
        }?> </p>
    </div>
</body>
</html>