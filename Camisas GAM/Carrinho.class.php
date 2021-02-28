<?php

class Carrinho{
    public function adicionar($idProduto, $quantidade, $sexo, $cor, $CEP, $tamanho){

        global $pdo;

        $sql = "SELECT * FROM Camisa WHERE id = '$idProduto';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $idProduto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }

            $dadosPedido = array();
            $dadosPedido[] = $dado['id'];
            $dadosPedido[] = $quantidade;
            $dadosPedido[] = $sexo;
            $dadosPedido[] = $cor;
            $dadosPedido[] = $CEP;
            $dadosPedido[] = $tamanho;

            $_SESSION['carrinho'][] = $dadosPedido;
        }
    }

    public function remover(){    }
}

?>