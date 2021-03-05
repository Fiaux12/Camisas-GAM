<?php
    session_start();
    unset($_SESSION['idUsuario']);
    unset($_SESSION['carrinho']);
    unset($_SESSION['emailUsuario']);
    unset($_SESSION['nomeUsuario']);
    header("location: index.php");
?>
