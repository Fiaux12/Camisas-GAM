<?php
	require_once 'classe-camisa.php';
	$p = new Camisa("GAM","127.0.0.1","2018952999","coltec2020");
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
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">

					<!-- Logo -->
						<h1><a href="index.html">Camisas GAM</a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.html">Home</a></li>
								<li>
									<a href="#">Camisas</a>
									<ul>
										<li><a href="#">Geek</a></li>
										<li><a href="#">Religiosa</a></li>
										<li><a href="#">Animes</a></li>
										<li><a href="#">Barba</a></li>
										<li><a href="#">Caveira</a></li>
										<li><a href="#">Filmes e Séries</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Games</a></li>
										<li><a href="#">Halloween</a></li>
										<li><a href="#">Internet</a></li>
										<li><a href="#">Literatura</a></li>
										<li><a href="#">Música</a></li>
									</ul>
								</li>
								<li><a href="http://newton.coltec.ufmg.br/turma303-desenv/2018952999/hp/GAM/feminina.php">Feminina</a></li>
								<li><a href="http://newton.coltec.ufmg.br/turma303-desenv/2018952999/hp/GAM/masculina.php">Masculina</a></li>
								<li><a href="http://newton.coltec.ufmg.br/turma303-desenv/2018952999/hp/GAM/unissex.php">Unissex</a></li>
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
											<div class="col-4 col-6-medium col-12-small">
												<section class="box">
													<?php
														$dados = $p->buscaDadosLinha(20);
														if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if($k == "img"){
																		?><a href="#" class="image featured"><?php
																			echo "<img src=".$v." width=370 height=260>";?>
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
															<li><a href="#" class="button alt">Comprar</a></li>
														</ul>
													</footer>
												</section>
											</div>
											<div class="col-4 col-6-medium col-12-small">
												<section class="box">
													<?php
														$dados = $p->buscaDadosLinha(21);
														if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if($k == "img"){
																		?><a href="#" class="image featured"><?php
																			echo "<img src=".$v." width=370 height=260>";?>
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
															<li><a href="#" class="button alt">Comprar</a></li>
														</ul>
													</footer>
												</section>
											</div>
											<div class="col-4 col-6-medium col-12-small">
												<section class="box">
													<?php
														$dados = $p->buscaDadosLinha(22);
														if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if($k == "img"){
																		?><a href="#" class="image featured"><?php
																			echo "<img src=".$v." width=370 height=260>";?>
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
															<li><a href="#" class="button alt">Comprar</a></li>
														</ul>
													</footer>
												</section>
											</div>
											<div class="col-4 col-6-medium col-12-small">
												<section class="box">
													<?php
														$dados = $p->buscaDadosLinha(23);
														if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if($k == "img"){
																		?><a href="#" class="image featured"><?php
																			echo "<img src=".$v." width=370 height=260>";?>
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
															<li><a href="#" class="button alt">Comprar</a></li>
														</ul>
													</footer>
												</section>
											</div>
											<div class="col-4 col-6-medium col-12-small">
												<section class="box">
													<?php
														$dados = $p->buscaDadosLinha(24);
														if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if($k == "img"){
																		?><a href="#" class="image featured"><?php
																			echo "<img src=".$v." width=370 height=260>";?>
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
															<li><a href="#" class="button alt">Comprar</a></li>
														</ul>
													</footer>
												</section>
											</div>
											<div class="col-4 col-6-medium col-12-small">
												<section class="box">
													<?php
														$dados = $p->buscaDadosLinha(25);
														if(count($dados) > 0){
															for($i=0; $i < count($dados); $i++){
																foreach ($dados[$i] as $k => $v) {
																	if($k == "img"){
																		?><a href="#" class="image featured"><?php
																			echo "<img src=".$v." width=370 height=260>";?>
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
															<li><a href="#" class="button alt">Comprar</a></li>
														</ul>
													</footer>
												</section>
											</div>
										</div>
									</section>

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