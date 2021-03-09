<!DOCTYPE html>
<html>
<head>
		<title>Produto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

	</head>
    <body>
<?php

    if (isset($_POST['addPreferencia'])) {

        require 'conexao.php';
        require 'Pedido.class.php';

        $p = new Pedido();
        
        $idCamisa = $_POST['addPreferencia'];
        $idConta = $_SESSION['idUsuario'];

        global $pdo;
        $sql = "SELECT id_camisa FROM Preferencia WHERE id_camisa = '$idCamisa';";
        $sql = $pdo->prepare($sql);
        $sql->execute();
       
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            echo $dado['id_camisa'];
            header("Location: index.php");
        }else {
            $p->criaPreferencia($idCamisa, $idConta);
            header("Location: index.php");
        }
        
    }
?>

    </body>
</html>