<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrinho</title>
</head>
<body>
    <h1>Carrinho</h1>
    <?php
        require 'conexao.php';
        require 'Carrinho.class.php';

        $c = new Carrinho();
       
        $id = $_POST['idCamisa'];
        $quantidade = $_POST['quantidade'];
        $cor = $_POST['cor'];
        $sexo = $_POST['sexo'];
        $tamanho = $_POST['tamanho'];
        $CEP =  $_POST['CEP'];
        
        $c->adicionar($id, $quantidade, $sexo, $cor, $CEP, $tamanho);

        foreach($_SESSION['carrinho'] as $produto){
            echo "session: " . $produto[0];
            echo ("<br>");
            foreach($produto as $coisa){
                echo $coisa;
                echo ("<br>");

            }
        }

    
    ?>

</body>
</html>
