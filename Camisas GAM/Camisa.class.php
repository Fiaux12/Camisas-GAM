<?php

	Class Camisa{


		public function buscaDadosLinha($id){
			global $pdo;
			$resultado = array();
			$cmd = $pdo->query("SELECT id, img, nome, preco FROM Camisa WHERE id = '$id'");
			$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}

		public function buscaPreferencias($idConta){  

			global $pdo;
				
			$cmd = $pdo->query("SELECT Camisa.id, Camisa.img, Camisa.nome, Camisa.preco FROM Camisa  INNER JOIN Preferencia ON Camisa.id = Preferencia.id_camisa WHERE Preferencia.id_conta = '$idConta'");
			$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}

		public function contaPreferencias($idConta){  

			global $pdo;

			$sql = "SELECT Camisa.id, Camisa.img, Camisa.nome, Camisa.preco FROM Camisa  INNER JOIN Preferencia ON Camisa.id = Preferencia.id_camisa WHERE Preferencia.id_conta = '$idConta'";
			$sql = $pdo->prepare($sql);
			$sql->execute();
	
			$linhas = $sql->rowCount();
	
			return $linhas;
			   
		}
	}

?>