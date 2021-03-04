<?php

    if (isset($_POST['confirmaCliente']) && !empty($_POST['confirmaCliente'])) {
        require 'conexao.php';
        require 'Pedido.class.php';

        $pedidoConfirmacao = new Pedido();
        
        $idPedido = $_POST['confirmaCliente'];

        $confirmacao = "V";

        $pedidoConfirmacao->confirmacaoPedidoCliente($confirmacao, $idPedido);
        header("Location: acompanharPedido.php");
    }
?>