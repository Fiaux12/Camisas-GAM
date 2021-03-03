<?php

class Carrinho{
    public function adicionar($idProduto, $quantidade, $sexo, $cor, $tamanho){

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
            $dadosPedido[] = $dado['id'];        //0
            $dadosPedido[] = $dado['descricao']; //1
            $dadosPedido[] = $dado['preco'];     //2
            $dadosPedido[] = $dado['nome'];      //3
            $dadosPedido[] = $dado['img'];       //4
            $dadosPedido[] = $quantidade;        //5
            $dadosPedido[] = $sexo;              //6
            $dadosPedido[] = $cor;               //7
            $dadosPedido[] = $tamanho;           //8

            $_SESSION['carrinho'][] = $dadosPedido;
        }
    }

    public function remover(){    }

    public function busca($id){

        global $pdo;
			$resultado = array();
			$cmd = $pdo->query("SELECT id, img, nome, preco FROM Camisa WHERE id = '$id'");
			$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;

    }
}

?>