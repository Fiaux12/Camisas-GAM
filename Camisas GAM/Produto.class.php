<?php

class Produto{

    public function criarPedido(){    }

    public function selecionarDados($idProduto){

        global $pdo;

        $sql = "SELECT * FROM Camisa WHERE id = '$idProduto';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $idProduto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            echo $dado['nome'];echo("</br>");
            echo $dado['preco'];echo("</br>");
            echo $dado['descricao'];echo("</br>");
            echo $dado['img'];echo("</br>");

            
            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }          

            $dadosPedido = array();
            $dadosPedido[] = $dado['id'];
            //add outros dados do pedido no array acima.
            $_SESSION['carrinho'][] = $dadosPedido;

            return $dado;

        }

    }
    
}

?>
