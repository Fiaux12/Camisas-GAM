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
            echo $dado['quantidade'];echo("</br>");
            echo $dado['descricao'];echo("</br>");
            echo $dado['genero'];echo("</br>");
            echo $dado['tamanho'];echo("</br>");
            echo $dado['img'];echo("</br>");
            echo $dado['cor'];echo("</br>");

            $_REQUEST['dados'] = $dado['nome'];

           // $_SESSION['idUsuario'] = $dado['id'];
           //criar um vetor pra de idProduto pra depois colocar na session  

        }

    }
    
}

?>