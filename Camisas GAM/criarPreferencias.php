
<?php

    if (isset($_POST['addPreferencia'])) {

        require 'conexao.php';
        require 'Pedido.class.php';

        $p = new Pedido();
        
        $idCamisa = $_POST['addPreferencia'];
        $idConta = $_SESSION['idUsuario'];

        global $pdo;
        $sql = "SELECT id_camisa FROM Preferencia WHERE id_camisa = '$idCamisa' AND id_conta = '$idConta';";
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
