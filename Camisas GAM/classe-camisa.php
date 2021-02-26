<?php

	Class Camisa{

	private $conec;
	
	public function __construct($db, $host, $user, $pass){
		$charset = 'utf8mb4';
		$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

		 try {
		    $this->conec = new PDO($dsn, $user, $pass);
		    $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo 'erro ao conectar com BD: ' . $e->getMessage();
		    exit;
		}
	}

	public function buscaDadosLinha($id){
		$resultado = array();
		$cmd = $this->conec->query("SELECT id, img, nome, preco FROM Camisa WHERE id = '$id'");
		$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $resultado;
	}

}




?>