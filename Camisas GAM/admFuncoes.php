<?php
	require 'conexao.php';
	require 'Select.class.php';
	require 'Usuario.class.php';

    $s = new Select();
    $p = new Usuario();
	session_start();

  	if(!empty($_POST['identificador'])){ 
		$idt = $_POST['identificador'];
		$_SESSION['idt'] = $idt;
	}

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

		<style>
			/* The Modal (background) */
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  padding-top: 100px; /* Location of the box */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgb(0,0,0); /* Fallback color */
			  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal Content */
			.modal-content {
			  background-color: #fefefe;
			  margin: auto;
			  padding: 20px;
			  border: 1px solid #888;
			  width: 60%;
			}

			/* The Close Button */
			.close {
			  color: #aaaaaa;
			  float: right;
			  font-size: 28px;
			  font-weight: bold;
			}

			.close:hover,
			.close:focus {
			  color: #000;
			  text-decoration: none;
			  cursor: pointer;
			}
		</style>
	</head>
	<div id="logins">
		<a href="sair.php" style="font-size: 16px;">Sair</a>
	</div>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<h2>Administrador de TI: <?php echo $_SESSION['nomeUsuario']; ?></h2><br>
					<?php 
						if ($_SESSION['idt'] == "produtos"){
							echo "<h2>Produtos</h2>";
						}else if ($_SESSION['idt'] == "contas"){
							echo "<h2>Contas</h2>";
						}else if ($_SESSION['idt'] == "pedidos"){
							echo "<h2>Pedidos</h2>";
						}

					?>
				</section>
					<?php
						if(isset($_GET['id_up'])){
							$id_update = addslashes($_GET['id_up']);
							?><script>modal.style.display = "block";</script><?php
							if ($_SESSION['idt'] == "produtos"){
								$res = $s->buscarDadosProdutoLinha($id_update);
							}else if ($_SESSION['idt'] == "contas"){
								$res = $s->buscarDadosContaLinha($id_update);
							}else if ($_SESSION['idt'] == "pedidos"){
								$res = $s->buscarDadosPedidoLinha($id_update);	
							}

						}
					?>
					<section id="main">
						<div class="container">
							<div class="row">
								<div class="col-12">

								<!-- Portfolio -->
									<section>
										<div class="row">
												<?php
													if ($_SESSION['idt'] == "produtos"){
												?>
													<table>
														<tr>
															<th>Id</th>
															<th>Imagem</th>
															<th>Nome</th>
															<th>Preço</th>
															<th>id_Categoria</th>
															<th>Descrição</th>
															<th><a id="myBtn">Inserir</a></th>
														</tr>
														<?php
															$dados = $s->buscarDadosProdutos();
															if(count($dados) > 0){
																for($i=0; $i < count($dados); $i++){
																	echo "<tr>";
																	foreach ($dados[$i] as $k => $v) {
																		echo "<td>".$v."</td>";
																	}
																	?>
																	<td>
																		<a id="myBtn" href="admFuncoes.php?id_up=<?php echo $dados[$i]['id'];?>">Editar</a>
																		<a href="admFuncoes.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a>
																	</td>
																	<?php
																	echo "</tr>";
																}
															}else{
																echo "A tabela não possui dados";
															}
														?>
													</table>
												<?php
													}else if ($_SESSION['idt'] == "contas"){
												?>
													<table>
														<tr>
															<th>id</th>
															<th>Tipo</th>
															<th>Nome</th>
															<th>Email</th>
															<th>Senha</th>
															<th><a id="myBtn">Inserir</a></th>
														</tr>
														<?php
															$dados = $s->buscarDadosContas();
															if(count($dados) > 0){
																for($i=0; $i < count($dados); $i++){
																	echo "<tr>";
																	foreach ($dados[$i] as $k => $v) {
																		echo "<td>".$v."</td>";
																	}
																	?>
																	<td>
																		<a id="myBtn" href="admFuncoes.php?id_up=<?php echo $dados[$i]['id'];?>">Editar</a>
																		<a href="admFuncoes.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a>
																	</td>
																	<?php
																	echo "</tr>";
																}
															}else{
																echo "A tabela não possui dados";
															}
														?>
													</table>
												<?php
													}else if ($_SESSION['idt'] == "pedidos"){
												?>
													<table>
														<tr>
															<th>Id</th>
															<th>Id Conta</th>
															<th>Status Pagamento</th>
															<th>Status Entrega</th>
															<th>Valor</th>
															<th>Forma</th>
															<th>Rua</th>
															<th>Número</th>
															<th>Bairro</th>
															<th>Cidade</th>
															<th>Referência</th>
															<th>Confirmado</th>
															<th><a id="myBtn">Editar</a></th>
														</tr>
														<?php
															$dados = $s->buscarDadosPedidos();
															if(count($dados) > 0){
																for($i=0; $i < count($dados); $i++){
																	echo "<tr>";
																	foreach ($dados[$i] as $k => $v) {
																		echo "<td>".$v."</td>";
																	}
																	?>
																	<td>
																		<a id="myBtn" href="admFuncoes.php?id_up=<?php echo $dados[$i]['id'];?>">Editar</a>
																		<a href="admFuncoes.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a>
																	</td>
																	<?php
																	echo "</tr>";
																}
															}else{
																echo "A tabela não possui dados";
															}
														?>
													</table>
												<?php
													}
												?>
										</div>
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

		<div id="myModal" class="modal">

			<?php
				if ($_SESSION['idt'] == "produtos"){
					if(isset($_POST['nome'])){
						if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
							$id_upd = addslashes($_GET['id_up']);
							$nome = addslashes($_POST['nome']);
							$img = addslashes($_POST['img']);
							$preco = addslashes($_POST['preco']);
							$id_categoria = addslashes($_POST['id_categoria']);
							$descricao = addslashes($_POST['descricao']);

							if(!empty($nome) && !empty($preco) && !empty($id_categoria) && !empty($img) && !empty($descricao)){

							$s->AtualizaProduto($id_upd, $nome, $preco, $id_categoria, $img, $descricao);
							echo "<script language='javaScript'>window.location.href='admFuncoes.php'</script>";

							}else{
								echo "Preencha todos os campos";
							}
						}else{
							$nome = addslashes($_POST['nome']);
							$img = addslashes($_POST['img']);
							$preco = addslashes($_POST['preco']);
							$id_categoria = addslashes($_POST['id_categoria']);
							$descricao = addslashes($_POST['descricao']);

							if(!empty($nome) && !empty($preco) && !empty($id_categoria) && !empty($img) && !empty($descricao)){
								if(!$s->InsereProduto($nome, $preco, $id_categoria, $img, $descricao)){
									echo "Produto já cadastrado";
								}
								echo "<script language='javaScript'>window.location.href='admFuncoes.php'</script>";

							}else{
								echo "Preencha todos os campos";
							}
						}
					}
				?>

				<!-- Modal content -->
				  <div class="modal-content">
				  	<span class="close">&times;</span>
				    <form method="POST">
						<h2 style="text-align: center;">Produto</h2>
						<label>Nome:</label>
						<input type="text" style="border: solid 1px;" name="nome" id="nome" value="<?php if(isset($res)){echo $res['nome'];}?>">
						<div class="row">
							<div>
								<label>Preço:</label>
								<input type="number" style="border: solid 1px;" name="preco" id="preco" value="<?php if(isset($res)){echo $res['preco'];}?>">
							</div>
							<div >
								<label>ID Categoria:</label>
								<input type="number" style="border: solid 1px;" name="id_categoria" id="id_categoria" value="<?php if(isset($res)){echo $res['id_categoria'];}?>">
							</div>
						</div>
						<label>Path Imagem:</label>
						<input type="text" style="border: solid 1px;" name="img" id="img" value="<?php if(isset($res)){echo $res['img'];}?>">
						<label>Descrição:</label>
						<input type="text" style="border: solid 1px;" name="descricao" id="descricao" value="<?php if(isset($res)){echo $res['descricao'];}?>"><br>
						<input type="submit" value="<?php if(isset($res)){echo "Editar";}else{echo "Inserir";}?>">
					</form>
				  </div>
				<?php
				}else if ($_SESSION['idt'] == "contas"){
					if(isset($_POST['nome'])){
						if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
							$id_upd = addslashes($_GET['id_up']);
							$nome = addslashes($_POST['nome']);
							$email = addslashes($_POST['email']);
							$tipoUsuario = addslashes($_POST['tipo']);
							$senha = addslashes($_POST['senha']);
							if(!empty($nome) && !empty($email) && !empty($tipoUsuario) && !empty($senha)){

							$s->AtualizaConta($id_upd, $nome, $email, $tipoUsuario, $senha);
							echo "<script language='javaScript'>window.location.href='admFuncoes.php'</script>";

							}else{
								echo "Preencha todos os campos";
							}
						}else{
							$nome = addslashes($_POST['nome']);
							$email = addslashes($_POST['email']);
							$tipoUsuario = addslashes($_POST['tipo']);
							$senha = addslashes($_POST['senha']);
							if(!empty($nome) && !empty($email) && !empty($tipoUsuario) && !empty($senha)){

								if(!$p->cadastro($nome, $email, $tipoUsuario, $senha)){
									echo "Email já cadastrado";
								}
								echo "<script language='javaScript'>window.location.href='admFuncoes.php'</script>";

							}else{
								echo "Preencha todos os campos";
							}
						}
					}

				?>

				<!-- Modal content -->
				  <div class="modal-content">
				    <span class="close">&times;</span>
				    <form method="POST">
						<h2 style="text-align: center;">Conta</h2>
						<label>Nome:</label>
						<input type="text" style="border: solid 1px;" name="nome" id="nome" value="<?php if(isset($res)){echo $res['nome'];}?>">
						<label>Email:</label>
						<input type="text" style="border: solid 1px;" name="email" id="email" value="<?php if(isset($res)){echo $res['email'];}?>">
						
						<div class="row">
							<div>
								<label>Tipo:</label>
								<input type="text" style="border: solid 1px;" name="tipo" id="tipo" value="<?php if(isset($res)){echo $res['tipo'];}?>">
							</div>
							<div >
								<label>Senha:</label>
								<input type="text" style="border: solid 1px;" name="senha" id="senha" value="<?php if(isset($res)){echo $res['senha'];}?>">
							</div>
						</div> 
						<br>
						<input type="submit" value="<?php if(isset($res)){echo "Editar";}else{echo "Inserir";}?>">
					</form>
				  </div>
				<?php
				}else if ($_SESSION['idt'] == "pedidos"){
					if(isset($_POST['status_pagamento'])){
						if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
							$id_upd = addslashes($_GET['id_up']);
							$pagamento = addslashes($_POST['status_pagamento']);
							$entrega = addslashes($_POST['status_entrega']);
							$confirmacao = addslashes($_POST['confirmacaoCliente']);
							if(!empty($pagamento) && !empty($entrega) && !empty($confirmacao)){
								$s->AtualizaPedido($id_upd, $pagamento, $entrega, $confirmacao);
								echo "<script language='javaScript'>window.location.href='admFuncoes.php'</script>";

							}else{
								echo "Preencha todos os campos";
							}
						}
					}
					?>
					<div class="modal-content">
					    <span class="close">&times;</span>
					    <form method="POST">
							<h2 style="text-align: center;">Pedido</h2>
							<label>Status Pagamento:</label>
							<input type="text" style="border: solid 1px;" name="status_pagamento" id="status_pagamento" value="<?php if(isset($res)){echo $res['status_pagamento'];}?>">
							<label>Status Entrega:</label>
							<input type="text" style="border: solid 1px;" name="status_entrega" id="status_entrega" value="<?php if(isset($res)){echo $res['status_entrega'];}?>">
							<label>Confirmação do Cliente:</label>
							<input type="text" style="border: solid 1px;" name="confirmacaoCliente" id="confirmacaoCliente" value="<?php if(isset($res)){echo $res['confirmacaoCliente'];}?>"> 
							<br>
							<input type="submit" value="Editar">
						</form>
					</div>
					<?php
				}	
			?>
		</div>

		<!-- Scripts -->
		<script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal

		var btn = document.getElementById("myBtn");

		var linkbtn = document.getElementById("linkBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		  modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
		    modal.style.display = "none";
		  }
		}

		</script>

	</body>
</html>

<?php 
	if(isset($_GET['id'])){
		$id_excluir = addslashes($_GET['id']);
		if ($_SESSION['idt'] == "produtos"){
			$s->excluirProduto($id_excluir);
		}else if ($_SESSION['idt'] == "contas"){
			$s->excluirConta($id_excluir);
		}else if ($_SESSION['idt'] == "pedidos"){
			$s->excluirPedido($id_excluir);
		}
		echo "<script language='javaScript'>window.location.href='admFuncoes.php'</script>";
	}
?>
