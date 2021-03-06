<?php
	require 'conexao.php';
	require_once 'Camisa.class.php';
	$p = new Camisa();

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
		<?php
		if(!isset($_SESSION['idUsuario'])){
		?>
			<a href="./cadastro.php"><button type="button" class="btn btn-primary">Cadastre-se</button></a>
			<a href="./logar.php"><button type="button" class="btn btn-primary">Login</button></a>
			<a href="./carrinho.php"><img src="imgs/carrinho.png" width=30 height=20></a>
		<?php
		}else{
		?>
			<a href="preferencias.php"><button type="button" class="btn btn-primary">Preferências</button></a>
			<a href="mudarSenha.php"><button type="button" class="btn btn-primary">Mudar Senha</button></a>
			<a href="acompanharPedido.php"><button type="button" class="btn btn-primary">Pedidos</button></a>
			<a href="sair.php"><button type="button" class="btn btn-primary">Sair</button></a>
			<a href="./carrinho.php"><img src="imgs/carrinho.png" width=30 height=20></a>
		<?php
		}
		?>
	</div>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

					<!-- Logo -->
						<h1><a href="index.php">Camisas GAM</a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.php">Home</a></li>
								<li><a href="categorias/geek.php">Geek</a>
									<ul>
										<li><a href="categorias/animes.php">Animes</a></li>
										<li><a href="categorias/filmeserie.php">Filmes e Séries</a></li>
										<li><a href="categorias/games.php">Games</a></li>
										<li><a href="categorias/internet.php">Internet</a></li>
									</ul>
								</li>
								<li><a href="categorias/religiosa.php">Religiosa</a></li>
								<li><a href="categorias/barba.php">Barba</a></li>
								<li><a href="categorias/caveira.php">Caveira</a></li>
								<li><a href="categorias/food.php">Food</a></li>
								<li><a href="categorias/halloween.php">Halloween</a></li>
								<li><a href="categorias/literatura.php">Literatura</a></li>
								<li><a href="categorias/musica.php">Música</a></li>
							</ul>
						</nav>

					<!-- Banner -->
						
                </section>
			<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="row">
							<div class="col-12">

								<!-- Portfolio -->
									<section style="text-align: center;">
										<header class="major">
											<h2>Minhas Preferências</h2>
										</header>
										
                                        <?php
                                        if ($p->contaPreferencias($_SESSION['idUsuario']) > 0) {
											for($i = 0; $i <= $cont; $i++){
                                        ?>		
										<div class="row" style="text-align: center;">
											<div class="col-12" style="text-align: center;">

												<section style="clear: both;" class="box" >
													<?php
														$dados = $p->buscaPreferencias($_SESSION['idUsuario']);
                                                        if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if ($k == "id") {
																		$idCamisa = $v;
																	}
																	if($k == "img"){
																		echo "<header><img src=".$v." height=260></header>";
																	}
																	if($k == "nome"){
																		echo "<header><h3>".$v."</h3></header>";
																	}
																	if($k == "preco"){
																		echo'<form action="./mostraProduto.php" method="POST">';
																			
																			echo '<button type = "submit" name = "identificador" value="'.$idCamisa.'"> Comprar R$'.$v.'</button><BR>';
																		
																		echo '</form>';
																	}
																}
															}
														}
													?>
													<footer>
														<ul class="actions">
															
														</ul>
													</footer>
													
												</section>
											</div>
										</div>
                                        <?php
                                            }
										}else {
											echo '<h2 style="color:black;">Você ainda não possui preferências!</h2>';
										}
                                        ?>
									</section>
							</div>
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
