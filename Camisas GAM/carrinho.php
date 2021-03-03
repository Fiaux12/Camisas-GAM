<?php
	require 'conexao.php';
    require 'Carrinho.class.php';
    require_once 'Camisa.class.php';
    $p = new Camisa();

	$dados = new Carrinho();
	
?>

<!DOCTYPE html>
<html>
<head>
		<title>Carrinho</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

	</head>
	<body>
    <p>.</p>
        <br>
        <h1 style="color: white; font-size:30px; text-align: center; " >Bem Vindo ao Carrinho de Compras!</h1>
        <br><br>
        <?php
            //session_destroy();
            $total = 0.00;
            foreach($_SESSION['carrinho'] as $dadosPedido){
                
                echo '<fieldset class="centro-borda">';
                    echo '<div class="centro">';
                        echo '<img src="'. $dadosPedido[4] .'"  align="left" width="300" height="320">';
                        echo '<b><p id="car">'.$dadosPedido[3].'</p></b>';
                        echo '<p id="car">Tamanho: '.$dadosPedido[8].'</p>';
                        echo '<p id="car">Cor: '.$dadosPedido[7].'</p>';
                        echo '<p id="car">Sexo: '.$dadosPedido[6].'</p>';
                        echo '<p  style="color: white;" id="cad">Quantidade:'.$dadosPedido[5].'</p> ';
                        echo '<p id="car">R$'.$dadosPedido[2].'</p>';
                    echo '</div>';
                echo '</fieldset>';

                $total += $dadosPedido[2];
            }
        ?>
        <div class="cent" style=" text-align: center;">
            <form action="pagar.php" method="POST">
                <?php
                    
                echo'<button  type = "submit" name = "btncomprar" value = "'.$total.'" class="centro"><i class="fa fa-shopping-cart"></i>Finalizar Compra<br>R$'.$total.'</button>';
                    
                ?>
            </form>
            <br>
            <form action="index.php" method="POST">
                <?php
                    
                echo'<button  type = "submit" class="centro">Voltar às compras</button>';
                    
                ?>
            </form>
        </div>
         <div class="centro" style="width: 30%; display: table;">
       <div class="centro" style="display: table-row; height: 1px;">
            <div style="width: 2%; display: table-cell;">
      <i class="fa fa-truck" style=" color: rgb(177,210,119);"></i>
  </div>
  <div class="centro" style="display: table-cell;">
      <p  style=" color: rgb(177,210,119);" id="cad-log">O frete é grátis! Não se preocupe.</p>
  </div>
</div>
</div>
	</body>
	</html>