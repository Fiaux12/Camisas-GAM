<?php

class Carrinho{
    //ainda n funciona
    public function adicionar($idProduto){

        global $pdo;

        $sql = "SELECT * FROM Camisas WHERE id = '$idProduto'';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $idProduto);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            echo $dado['email'];
            echo $dado['senha'];

            $_SESSION['idUsuario'] = $dado['id'];

            return true;
        }else{
            return false;
        }
    
    }

    public function remover(){    }
}

?>