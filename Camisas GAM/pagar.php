<?php
  require 'conexao.php';
  require 'Usuario.class.php';

    if (isset($_POST['btncomprar']) && !empty($_POST['btncomprar'])) {

        $total = $_POST['btncomprar'];

    }

?>

<!DOCTYPE html>
<html>
<head>
		<title>Pagar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

	</head>
	<body>
    <?php
      if(!isset($_SESSION['idUsuario'])){
      ?>
        <div>
          <a href="index.php"><div><i class="fa fa-home">Home</i></div></a>
        </div>
        <div style="text-align: center;">
          <h1 id="cad-log">Está quase pronto, só falta fazer o pagamento!</h1>
          <p id="cad-log">Para continuar faça o login ou cadastre-se.</p>
          <a href="./cadastro.php"><button type="button" class="btn btn-primary">Cadastre-se</button></a>
          <a href="./logar.php"><button type="button" class="btn btn-primary">Login</button></a>
        </div>
        
      <?php
      }else{
      ?>        
      <div>
        <a href="index.php"><div><i class="fa fa-home">Home</i></div></a>
      </div>
      <div class="centro">
        <div style="text-align: center;">
          <h1 id="cad-log">Está quase pronto, só falta fazer o pagamento</h1>
          <p id="cad-log">Insira as informações referentes ao local de entrega e a forma de pagamento.</p>
        </div>
          
        <form action="pedido.php" method="POST" id="pagar">
          <fieldset>
            
            <label id="cad-log">Forma de pagamento</label>
            <select id = "myList" name="formaPagamento">
              <option value = "Boleto">Boleto Bancário</option>
              <option value = "Cartão">Cartão de Crédito</option>
              <option value = "Cartão">Cartão de Débito</option>
            </select>

            <br>
            <label id="cad-log">Rua:</label> <input type="text" name="rua" id="rua"><br>
            <label id="cad-log">Número:</label> <input type="text" name="numero" id="numero"><br>
            <label id="cad-log">Bairro:</label> <input type="text" name="bairro" id="bairro"><br>
            <label id="cad-log">Cidade:</label> <input type="text" name="cidade" id="Cidade"><br>

        </fieldset>
        <fieldset>
          <label id="cad-log">Ponto de referência:</label>
          <textarea rows="2" cols="50" name="referencia" form="pagar" id="pag">Exemplo:(cor da casa, apartamento...)</textarea>
        </fieldset>
        <br>
        <fieldset>
          <?php
            
            echo'<button type="submit" name="confirmarPedido" value="'.$total.'"><i class="fa fa-shopping-cart"></i>  Confirmar Pedido <br>R$'.$total.'</button>';
            
          ?>
        </fieldset>
      </form>
        <a href="https://streamlabs.com/glaucus120/tip">Emitir nota fiscal</a>
  </div>
  <?php
      }
  ?>
  </body>
  </html>
