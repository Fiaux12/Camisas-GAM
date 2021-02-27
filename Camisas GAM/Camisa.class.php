<?php

	Class Camisa{


		public function buscaDadosLinha($id){
			global $pdo;
			$resultado = array();
			$cmd = $pdo->query("SELECT id, img, nome, preco FROM Camisa WHERE id = '$id'");
			$resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}

	}

?>