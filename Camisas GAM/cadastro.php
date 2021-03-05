<?php
	require 'conexao.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Cadastro de Usuário </title>
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
					<h1 id="cad-log">Bem vindo ao cadastro!</h1>
					<p id="cad-log">Tenha certeza de que seus dados estão corretos</p>
				</div>
			</header>
		</div>
		<form action="salvarCadastro.php" method="POST" class="centro">
			<?php
				if ($_SESSION['cadastro'] == 'invalido') {
					echo '<p id="cad-log">Email já cadastrado!</p>';
					unset($_SESSION['cadastro']);
				}
			?>
			<label id="cad-log">Nome:</label> <input type="text" name="nome" id="nome"><br>
			<label id="cad-log">Email:</label> <input type="email" name="email" id="email"><br>
			<label id="cad-log">Senha:</label> <input type="password" name="senha" id="senha"><br>
			
			<input type="submit" id="cadastrar">

		</form>
	</body>
</html>
