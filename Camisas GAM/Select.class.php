<?php

class Select{

	public function buscarDadosProdutos(){

        global $pdo;

        $resultado = array();
        $cmd = $pdo->query("SELECT * FROM Camisa");
        $resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function buscarDadosContas(){
        global $pdo;

        $resultado = array();
        $cmd = $pdo->query("SELECT * FROM Conta");
        $resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function buscarDadosContasClientes(){
        global $pdo;

        $resultado = array();
        $cmd = $pdo->query("SELECT Conta.id AS Num_Conta, Conta.nome , COUNT(id_conta) AS Pedidos_Pagos FROM Pedido INNER JOIN Conta ON Pedido.id_conta = Conta.id WHERE confirmacaoCliente = "V"  GROUP BY Conta.id  HAVING count(Pedidos_Pagos) > 1 ORDER BY Pedidos_Pagos DESC");
        $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

	public function buscarDadosPedidos(){
		global $pdo;

		$resultado = array();
		$cmd = $pdo->query("SELECT * FROM Pedido");
		$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $resultado;
    }

    public function buscarDadosContaLinha($id){
        global $pdo;

        $resultado = array();
        $cmd = $pdo->prepare("SELECT * FROM Conta WHERE id = :id");
        $cmd->bindValue(":id",$id);
    	$cmd->execute();
        $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function buscarDadosProdutoLinha($id){
        global $pdo;

        $resultado = array();
        $cmd = $pdo->prepare("SELECT * FROM Camisa WHERE id = :id");
        $cmd->bindValue(":id",$id);
    	$cmd->execute();
        $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function buscarDadosPedidoLinha($id){
        global $pdo;

        $resultado = array();
        $cmd = $pdo->prepare("SELECT status_pagamento, status_entrega, confirmacaoCliente FROM Pedido WHERE id = :id");
        $cmd->bindValue(":id",$id);
    	$cmd->execute();
        $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function AtualizaProduto($id, $nome, $preco, $categoria, $imagem, $descricao){
        global $pdo;

        $cmd = $pdo->prepare("UPDATE Camisa SET img = :i, nome = :n, preco = :p, id_categoria = :c, descricao = :d WHERE id = :id");
       	$cmd->bindValue(":i",$imagem);
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":p",$preco);
        $cmd->bindValue(":c",$categoria);
        $cmd->bindValue(":d",$descricao);
        $cmd->bindValue(":id",$id);
    	$cmd->execute();
    }

    public function AtualizaConta($id, $nome, $email, $tipoUsuario, $senha){
        global $pdo;

		$cmd = $pdo->prepare("UPDATE Conta SET tipo = :t, nome = :n, email = :e, senha = :s WHERE id = :id");
		$cmd->bindValue(":n",$nome);
		$cmd->bindValue(":e",$email);
		$cmd->bindValue(":t",$tipoUsuario);
		$cmd->bindValue(":s",$senha);
		$cmd->bindValue(":id",$id);
		$cmd->execute();
        
    }

    public function AtualizaPedido($id, $pagamento, $entrega, $confirmacao){
        global $pdo;

        $cmd = $pdo->prepare("UPDATE Pedido SET status_pagamento = :p, status_entrega = :e, confirmacaoCliente = :c WHERE id = :id");
       	$cmd->bindValue(":p",$pagamento);
        $cmd->bindValue(":e",$entrega);
        $cmd->bindValue(":c",$confirmacao);
        $cmd->bindValue(":id",$id);
    	$cmd->execute();
    }

    public function InsereProduto($nome, $preco, $categoria, $imagem, $descricao){
        global $pdo;

 		$cmd = $pdo->prepare("INSERT INTO Camisa (img, nome, preco, id_categoria, descricao) VALUES (:i, :n, :p, :c, :d)");
 		$cmd->bindValue(":i",$imagem);
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":p",$preco);
        $cmd->bindValue(":c",$categoria);
        $cmd->bindValue(":d",$descricao);
    	$cmd->execute();
        return true;
    }

    public function excluirProduto($id){
    	global $pdo;
    	$cmd = $pdo->prepare("DELETE FROM Camisa WHERE id = :id");
    	$cmd->bindValue(":id",$id);
    	$cmd->execute();
    }

     public function excluirConta($id){
     	global $pdo;
    	$cmd = $pdo->prepare("DELETE FROM Conta WHERE id = :id");
    	$cmd->bindValue(":id",$id);
    	$cmd->execute();
    }

     public function excluirPedido($id){
     	global $pdo;

    	$cmd = $pdo->prepare("DELETE FROM Pedido WHERE id = :id");
    	$cmd->bindValue(":id",$id);
    	$cmd->execute();
    }


}

?>