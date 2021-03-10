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

    public function criaPreferencia($idCamisa, $idConta){  

        global $pdo;

        $sql = "INSERT into Preferencia(id_conta, id_camisa) values ('$idConta', '$idCamisa')";
        $sql = $pdo->prepare($sql);
        $sql->execute();

    }

    public function buscaConfirmacao($idPedido){  

        global $pdo;
        $sql = "SELECT confirmacaoCliente FROM Pedido WHERE id = '$idPedido';";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            return $dado;
        }
        
    }

    public function buscaPedidoCamisa($idPedido){  

        global $pdo;
        
        $sql = "SELECT id FROM PedidoCamisa WHERE id_pedido = '$idPedido';";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $idPedidoCamisa = $sql->fetch();
        $idPedidoCamisa;
                
        /*for ($i=0; $i < count($idPedidoCamisa); $i++) { 
            
            $sql = "SELECT * FROM PedidoCamisa WHERE id = '$idPedidoCamisa[$i]';";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0){
                $dados = $sql->fetch();
                echo $dados['id_camisa'] . '<br>';
                if(!isset($_SESSION['nota'])){
                    $_SESSION['nota'] = array();
                }
    
                for ($i=0; $i < count($dados); $i++) { 
                    foreach($dados as $dado){
                        $dadosPedido = array();
                        echo $dado['sexo'];
                        $dadosPedido[] = $dado['id'];          //0
                        $dadosPedido[] = $dado['quantidade'];  //1
                        $dadosPedido[] = $dado['id_pedido'];   //2
                        $dadosPedido[] = $dado['id_camisa'];   //3
                        $dadosPedido[] = $dado['cor'];         //4
                        $dadosPedido[] = $dado['sexo'];        //5
                        //$dadosPedido[] = $$dado['tamanho'];    //6
                    }
                $_SESSION['nota'][] = $dadosPedido;
    
                }
            }
        }*/

        

        

    }

    public function buscaNotaPedido($idPedido){  
        global $pdo;

        $sql = "SELECT * FROM Pedido WHERE id = '$idPedido';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $idPedido);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            if(!isset($_SESSION['notaPedido'])){
                $_SESSION['notaPedido'] = array();
            }

            $dadosPedido = array();
            $dadosPedido[] = $dado['id'];                //0
            $dadosPedido[] = $dado['id_conta'];          //1
            $dadosPedido[] = $dado['status_pagamento'];  //2
            $dadosPedido[] = $dado['status_entrega'];    //3
            $dadosPedido[] = $dado['preco'];             //4
            $dadosPedido[] = $dado['formaPagamento'];    //5
            $dadosPedido[] = $dado['rua'];               //6
            $dadosPedido[] = $dado['numero'];            //7
            $dadosPedido[] = $dado['bairro'];            //8
            $dadosPedido[] = $dado['cidade'];            //9
            $dadosPedido[] = $dado['referencia'];        //10
            $dadosPedido[] = $dado['confirmacaoCliente'];//11

            $_SESSION['notaPedido'][] = $dadosPedido;
        }

    }

    public function buscarPedido($idConta){  

        global $pdo;
        $resultado = array();
        $cmd = $pdo->query("SELECT Pedido.id, status_pagamento, status_entrega, preco  FROM Pedido INNER JOIN Conta ON Pedido.id_conta = Conta.id WHERE Conta.id = '$idConta';");
        $resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;

    }

    public function confirmacaoPedidoCliente($confirmacao, $idPedido){ 
        global $pdo;

        $sql = "UPDATE Pedido SET confirmacaoCliente = '$confirmacao' WHERE id = '$idPedido'";
        $sql = $pdo->prepare($sql);
        $sql->execute();
    }

}

?>