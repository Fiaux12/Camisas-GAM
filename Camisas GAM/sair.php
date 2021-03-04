<?php
    session_start();
    unset($_SESSION['idUsuario']);
    unset($_SESSION['carrinho']);
    header("location: index.php");
?>
