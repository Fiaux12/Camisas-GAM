<?php

    if (isset($_POST['confirmarPedido']) && !empty($_POST['confirmarPedido'])) {

        require 'conexao.php';
        require 'Pedido.class.php';

        $p = new Pedido();
        
        //pedido
        $formaPagamento = $_POST['formaPagamento'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $referencia = $_POST['referencia'];
        $precoTotal = $_POST['confirmarPedido'];
        $statusPagamento = 'X';
        $statusEntrega = 'X';

        $idConta = $_SESSION['idUsuario'];

        $idPedido = $p->criarPedido($formaPagamento, $rua, $numero, $bairro, $cidade , $referencia , $statusPagamento , $statusEntrega , $idConta , $precoTotal);

        //pedidoCamisa
        foreach($_SESSION['carrinho'] as $dadosCarrinho){
            $idCamisa = $dadosCarrinho[0];
            $quantidade = $dadosCarrinho[5];
            $cor = $dadosCarrinho[7];
            $sexo = $dadosCarrinho[6];
            $tamanho = $dadosCarrinho[8];

            $p->criarPedidoCamisa($idCamisa, $quantidade , $cor , $sexo , $tamanho , $idPedido);
        }


        unset($_SESSION['carrinho']);
        header("Location: acompanharPedido.php");
    
    }

?>