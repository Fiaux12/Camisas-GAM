<?php
	require 'conexao.php';
	require_once 'Camisa.class.php';
	$p = new Camisa();
	session_start();
	if(!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] == 'cliente'){
		header("location: index.php");
		exit;
	}
?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Camisas GAM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<div id="logins">
		<a href="sair.php" style="font-size: 16px;">Sair</a>
	</div>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<h2>Administrador Normal: <?php echo $_SESSION['nomeUsuario']; ?></h2>
				</section>
					<section id="main">
					<div class="container">
						<div class="row">
							<div class="col-12">

							<!-- Portfolio -->
								<section>
									<div class="row">
										<div class="col-4 col-6-medium col-12-small">												
											<ul class="actions">
												<form action="./admFuncoes.php" method="POST">
													<input type="hidden" name="identificador" value="produtos"/>
													<button style="background-color: rgba(34, 30, 31, 0.98); width: 300px; margin-left: 17px;">Gerenciar Produtos</button>
											    </form>
											</ul>
										</div>
										<div class="col-4 col-6-medium col-12-small">
											<ul class="actions">
												<form action="./admFuncoes.php" method="POST">
													<input type="hidden" name="identificador" value="pedidos"/>
													<button style="background-color: rgba(34, 30, 31, 0.98); width: 300px; margin-left: 17px;">Gerenciar pedidos</button>
											    </form>
											</ul>
										</div>
									</div>
								</section>
							</div>
						</div>

			<!-- Footer -->
				<section id="footer">
					<div class="container">
						<div class="row">
							<div class="col-8 col-12-medium">
								<section>
									<!--Colocar alguma coisa aqui-->
								</section>
							</div>
							
							<div class="col-4 col-12-medium">
	
							</div>
							<div class="col-12">

								<!-- Copyright -->
									<div id="copyright">
										<ul class="links">
											<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
