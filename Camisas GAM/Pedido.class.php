<?php

class Pedido{

    public function criarPedido($formaPagamento, $rua, $numero, $bairro, $cidade , $referencia , $statusPagamento , $statusEntrega , $idConta , $precoTotal){ 
        global $pdo;

        $sql = "INSERT into Pedido(id_conta, status_pagamento, status_entrega, preco, formaPagamento, rua, numero, bairro, cidade, referencia) values ('$idConta', '$statusPagamento', '$statusEntrega', '$precoTotal', '$formaPagamento', '$rua', '$numero', '$bairro', '$cidade', '$referencia')";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        //pega o ultimo id add na tabela
        $idPedido = $pdo->lastInsertId();

        return $idPedido;
    }

    public function criarPedidoCamisa($idCamisa, $quantidade , $cor , $sexo , $tamanho , $idPedido){  
        global $pdo;

        $sql = "INSERT into PedidoCamisa(quantidade, id_pedido, id_camisa, cor, sexo, tamanho) values ('$quantidade', '$idPedido', '$idCamisa', '$cor', '$sexo', '$tamanho')";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        

    }

    public function excluirPedido(){  }

    public function fazerNota(){  }

    public function buscarPedido($idConta){  

        global $pdo;
			$resultado = array();
			$cmd = $pdo->query("SELECT Pedido.id, status_pagamento, status_entrega, preco  FROM Pedido INNER JOIN Conta ON Pedido.id_conta = Conta.id WHERE Conta.id = '$idConta';");
			$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;

    }


}
//select maker from Product INNER JOIN Printer ON Product.model = printer.model;
?>