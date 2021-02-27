<?php
    //Ainda n funciona
    if (isset($_POST['adicionar']) && !empty($_POST['adicionar'])) {
        require 'conexao.php';
        require 'Carrinho.class.php';
        echo "deu bom";
        
        $c = new Carrinho();
        
        $idProduto = (int)$_POST['adicionar'];

        if($c->adicionar($idProduto) == true){
            if(isset($_SESSION['idUsuario'])){
                echo "usuario logado e produto adicionado!";
            }else{
                echo "Faça login para adicionar produtos no carrinho!";
            }
        }
         

    }else{
        header("Location: index.php");
    }





?>