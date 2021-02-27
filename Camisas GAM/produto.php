<?php


    if (isset($_POST['identificador']) && !empty($_POST['identificador'])) {

        require 'conexao.php';
        require 'Produto.class.php';

        $p = new Produto();
        

        if($_POST['identificador'] == 'prod01'){
            $idProduto = '20';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
            
        }elseif($_POST['identificador'] == 'prod02'){
            $idProduto = '21';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == 'prod03'){
            $idProduto = '22';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == 'prod04'){
            $idProduto = '23';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == 'prod05'){
            $idProduto = '24';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == 'prod06'){
            $idProduto = '25';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }
    }

    function confereExistencia($idProduto){
        
        
        global $pdo;

        $sql = "SELECT * FROM Camisa WHERE id = '$idProduto';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $idProduto);
        $sql->execute();

        if($sql->rowCount() > 0){

           // $_SESSION['idUsuario'] = $dado['id'];
            return true;
            
        }elseif($sql->rowCount() == 0){
            return false;
        }
    }

?>
