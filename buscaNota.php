<?php

    if (isset($_POST['buscaPedido'])) {

        require 'conexao.php';
        require 'Pedido.class.php';

        $p = new Pedido();
        
        $idPedido = $_POST['numPedido'];
        echo $idPedido;

        $p->buscaPedidoCamisa($idPedido);
        $p->buscaNotaPedido($idPedido);

        header("Location: emitirNota.php");

    }else{
        header("Location: emitirNota.php");
    }

?>
