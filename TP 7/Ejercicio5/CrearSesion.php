<?php
    session_start();
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['pass'] = $_POST['pass'];
    echo "<a href='LeerSesion.php'>Ver valores</a>"
?>