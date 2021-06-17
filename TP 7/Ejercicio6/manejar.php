<?php
    session_start();
    if(isset($_SESSION['nombre'])){
        echo "Bienvenido $_SESSION[nombre]";
    }else{
        echo "No puede visitar esta página";
    }
?>