<?php


    if (isset($_POST['identificador']) && !empty($_POST['identificador'])) {

        require 'conexao.php';
        require 'Produto.class.php';

        $p = new Produto();
        

        if($_POST['identificador'] == '20'){
            $idProduto = '20';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
            
        }elseif($_POST['identificador'] == '21'){
            $idProduto = '21';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == '22'){
            $idProduto = '22';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == '23'){
            $idProduto = '23';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == '24'){
            $idProduto = '24';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }

        }elseif($_POST['identificador'] == '25'){
            $idProduto = '25';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '26'){
            $idProduto = '26';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '27'){
            $idProduto = '27';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '28'){
            $idProduto = '28';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '29'){
            $idProduto = '29';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '30'){
            $idProduto = '30';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '31'){
            $idProduto = '31';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '32'){
            $idProduto = '32';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '33'){
            $idProduto = '33';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '34'){
            $idProduto = '34';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '35'){
            $idProduto = '35';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '36'){
            $idProduto = '36';

            if(confereExistencia($idProduto) == true){

                $p->selecionarDados($idProduto);

            }else{
                echo("ERRO! Camisa não esta no banco!");
            }
        }elseif($_POST['identificador'] == '37'){
            $idProduto = '37';

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
