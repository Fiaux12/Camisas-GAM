<?php

    if (isset($_POST['addPreferencia'])) {

        require 'conexao.php';
        require 'Pedido.class.php';

        $p = new Pedido();
        
        $idCamisa = $_POST['addPreferencia'];
        $idConta = $_SESSION['idUsuario'];

        $p->criaPreferencia($idCamisa, $idConta);

        header("Location: index.php");
    
    }

?>