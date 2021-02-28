<?php
	require '../conexao.php';
	require_once '../Camisa.class.php';
	$p = new Camisa();
	session_start();
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
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<div id="logins">
		<?php
		if(!isset($_SESSION['idUsuario'])){
		?>
			<a href="../cadastrar.html"><button type="button" class="btn btn-primary">Cadastre-se</button></a>
			<a href="../logar.html"><button type="button" class="btn btn-primary">Login</button></a>
			<a href="../carrinho.html"><img src="../imgs/carrinho.png" width=30 height=20></a>
		<?php
		}else{
		?>
				<a href="#" style="font-size: 16px;"><?php echo $_SESSION['nomeUsuario']; ?></a>
				<a href="../sair.php" style="font-size: 16px;">Sair</a>
				<a href="../carrinho.html"><img src="../imgs/carrinho.png" width=30 height=20></a>
		<?php
		}
		?>
	</div>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

				
					

					<!-- Logo -->
						<h1><a href="../index.php">Camisas GAM</a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../index.php">Home</a></li>
								<li><a href="geek.php">Geek</a>
									<ul>
										<li><a href="animes.php">Animes</a></li>
										<li><a href="filmeserie.php">Filmes e Séries</a></li>
										<li><a href="games.php">Games</a></li>
										<li><a href="internet.php">Internet</a></li>
									</ul>
								</li>
								<li class="current"><a href="religiosa.php">Religiosa</a></li>
								<li><a href="barba.php">Barba</a></li>
								<li><a href="caveira.php">Caveira</a></li>
								<li><a href="food.php">Food</a></li>
								<li><a href="halloween.php">Halloween</a></li>
								<li><a href="literatura.php">Literatura</a></li>
								<li><a href="musica.php">Música</a></li>
							</ul>
						</nav>

					<!-- Banner -->
						<section id="banner">
							<header>
								<h2>Seja Bem Vindo!</h2>
								<p>As melhores camisas, só aqui!</p>
							</header>
						</section>
			<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="row">
							<div class="col-12">

							<!-- Portfolio -->
								<section>
									<header class="major">
										<h2>Adquira já a sua!</h2>
									</header>
									<div class="row">
										<div class="col-3 col-6-medium col-12-small">
											<section class="box">
												<?php
													$dados = $p->buscaDadosLinha(34);
													if(count($dados) > 0){
														for($i=0; $i < count($dados); $i++){
															foreach ($dados[$i] as $k => $v) {
																if($k == "img"){
																	?><a href="#" class="image featured"><?php
																		echo "<img src=../".$v." height=260>";?>
																	</a><?php
																}
																if($k == "nome"){
																	echo "<header><h3>".$v."</h3></header>";
																}
																if($k == "preco"){
																	echo "<h3 style='color:green'>".$v."</h3>";
																}
															}
														}
													}
												?>
												<footer>
													<ul class="actions">
													<form action="../mostraProduto.php" method="POST">
															<input type="hidden" name="identificador" value="34" />
															<button>Comprar</button>
													    </form>
													</ul>
												</footer>
											</section>
										</div>
									</div>
								</section>
											
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
								<section>
									<header>
										<h2 style="color:black">Nos siga nas redes sociais!</h2>
									</header>
									<ul class="social">
										<li><a class="icon brands fa-facebook-f" href="#"><span class="label">Facebook</span></a></li>
										<li><a class="icon brands fa-twitter" href="#"><span class="label">Twitter</span></a></li>
										<li><a class="icon brands fa-dribbble" href="#"><span class="label">Dribbble</span></a></li>
										<li><a class="icon brands fa-tumblr" href="#"><span class="label">Tumblr</span></a></li>
										<li><a class="icon brands fa-linkedin-in" href="#"><span class="label">LinkedIn</span></a></li>
									</ul>
								</section>
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>
