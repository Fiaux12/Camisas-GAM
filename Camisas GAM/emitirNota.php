<?php
	require 'conexao.php';
	require 'Pedido.class.php';
	$p = new Pedido();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nota Fiscal</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <style>
            table {
                font-family: arial, sans-serif;
                color:#ffffff;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #ffffff;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #434F4F;
            }
        </style>

    </head>
    <body>
    <body>
        <div>
            <a href="index.php"><div><i class="fa fa-home">Home</i></div></a>
        </div>
        <br>

        <?php
            if( !isset($_SESSION['notaPedido']) ){
        ?>
            <h1 style="color: white; font-size:30px; text-align: center;" >Nota Fiscal</h1>
            <br>        
            <h2 style="color: white;  text-align: center;">Digite o Número do pedido</h2>
            <br>

            <form action="buscaNota.php" method="POST" class="centro">
                <div class="col1" style="text-align: center;">
                    <input style="width: 50%;" type="number" name="numPedido">
                    <button style="width: 30%;" type = "submit" name = "buscaPedido" class="centro">Buscar</button>
                </div>
            </form>
        <?php
            }else{
                
                foreach($_SESSION['nota'] as $dadosPedido){
                    
                    echo '<fieldset class="centro-borda">';
                        echo '<div class="centro">';
                            //echo '<img src="'. $dadosPedido[0] .'"  align="left" width="300" height="320">';
                            echo '<b><p id="car">'.$dadosPedido[0].'</p></b>';
                            echo '<p id="car">Tamanho: '.$dadosPedido[6].'</p>';
                            echo '<p id="car">Cor: '.$dadosPedido[4].'</p>';
                            echo '<p id="car">Sexo: '.$dadosPedido[5].'</p>';
                            echo '<p  style="color: white;" id="cad">Quantidade:'.$dadosPedido[1].'</p> ';
                            echo '<p id="car">R$ Nada ainda'.$dadosPedido[2].'</p>';
                            ?>
                            
                            <?php
                        echo '</div>';
                    echo '</fieldset>';
                   
                }
                foreach($_SESSION['notaPedido'] as $dadosPedido){
                    
                    echo '<fieldset class="centro-borda">';
                        echo '<div class="centro">';
                            echo'<h2 style="color: white;  text-align: center;">Dados da Entrega</h2><br>';
                            echo '<p id="car">Pagamento: '.$dadosPedido[2].'</p>';
                            echo '<p id="car">Entrega: '.$dadosPedido[3].'</p>';
                            echo '<p id="car">Forma de Pagamento: '.$dadosPedido[5].'</p>';
                            echo '<p id="car">Rua: '.$dadosPedido[6].'</p>';
                            echo '<p id="car">Número: '.$dadosPedido[7].'</p>';
                            echo '<p id="car">Bairro: '.$dadosPedido[8].'</p>';
                            echo '<p id="car">Cidade: '.$dadosPedido[9].'</p>';
                            echo '<p id="car">Referencia: '.$dadosPedido[10].'</p>';
                            echo '<p id="car">Confirmação: '.$dadosPedido[11].'</p>';
                            echo '<p id="car">Preço Total R$ '.$dadosPedido[4].'</p>';
                            ?>
                            
                            <?php
                        echo '</div>';
                    echo '</fieldset>';
                   
                }
        ?>
            <div class="cent" style=" text-align: center;">
                
                <br>
                <form action="index.php" method="POST">
                    <?php
                        
                    echo'<button  type = "submit" class="centro">Voltar às compras</button>';
                        
                    ?>
                </form>
            </div>
        <?php
        unset($_SESSION['nota']);
        unset($_SESSION['notaPedido']);
        }
        ?>
	</body>
</html>