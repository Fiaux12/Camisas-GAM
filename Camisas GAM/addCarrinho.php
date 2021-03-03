
<?php
    require 'conexao.php';
    require 'Carrinho.class.php';

	$c = new Carrinho();
    $id = $_POST['idCamisa'];
    $quantidade = $_POST['quantidade'];
    $cor = $_POST['cor'];
    $sexo = $_POST['sexo'];
    $tamanho = $_POST['tamanho'];
    
    
    $c->adicionar($id, $quantidade, $sexo, $cor, $tamanho);
    
    header("Location: carrinho.php");

?>
