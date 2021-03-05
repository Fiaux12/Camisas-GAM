<?php
	require 'conexao.php';
	require 'Usuario.class.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Mudar Senha </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	</head>
	<body>

		<div id="container">
			<header>
				<div>
					<a href="index.php"><div><i class="fa fa-home">Home</i></div></a>
				</div>
				<div class="centro">
					<h1 id="cad-log">Bem vindo a Troca de Senha!</h1>
					<p id="cad-log">Tenha certeza de que seus dados estão corretos</p>
				</div>
			</header>
		</div>
		<form action="salvarMudarSenha.php" method="POST" class="centro">
            <?php
				if ($_SESSION['mudarSenha'] == 'invalido') {
					echo '<p id="cad-log">As senhas estão diferentes!</p>';
					unset($_SESSION['mudarSenha']);
				}
			?>
			<label id="cad-log">Senha Nova:</label> <input type="password" name="senhaNova" id="senhaN"><br>
			<label id="cad-log">Confirmar Senha :</label> <input type="password" name="confirmaSenha" id="senhaC"><br>

            
			<input type="submit" id="mudar">
		</form>
	</body>
</html>