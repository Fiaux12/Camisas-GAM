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
		<div class="centro">
        <h1 id="cad-log">Está quase pronto só falta fazer o pagamento</h1>
        <p id="cad-log">Paga aí namoralzinha</p>
      <form action="" method="POST" id="pagar">
        <fieldset>
          
          <label id="cad-log">Forma de pagamento</label>
          <select id = "myList" name="formaPagamento">
            <option value = "Boleto">Boleto</option>
            <option value = "Cartão">Cartão</option>
          </select>
          <br>
          <label id="cad-log">Rua:</label> <input type="text" name="rua" id="rua"><br>
          <label id="cad-log">Número:</label> <input type="text" name="numero" id="numero"><br>
          <label id="cad-log">Bairro:</label> <input type="text" name="bairro" id="bairro"><br>
          <label id="cad-log">Cidade:</label> <input type="text" name="Cidade" id="Cidade"><br>

      </fieldset>
      <fieldset>
        <label id="cad-log">Ponto de referência:</label>
       	<textarea rows="2" cols="50" name="endereço" form="pagar" id="pag">Exemplo:(cor da casa, apartamento...)</textarea>
      </fieldset>
      <br>
      <fieldset>
        <?php
          
          echo'<button type="submit" name="concluirPedido"><i class="fa fa-shopping-cart"></i>  Pagar<br>R$'.$total.'</button>';
          
        ?>
      </fieldset>
      </form>
      <a href="https://streamlabs.com/glaucus120/tip">Emitir nota fiscal</a>
</div>
  </body>
  </html>