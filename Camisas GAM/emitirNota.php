<?php
	require 'conexao.php';
	require 'Pedido.class.php';
	$p = new Pedido();
    $idPedido = 0;
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

            td {
                border: 1px solid #ffffff;
                text-align: left;
                padding: 8px;
                text-align: center;
                vertical-align: middle;
                padding: 30px;
            }
            th {
                border: 1px solid #ffffff;
                text-align: left;
                padding: 8px;
                text-align: center;
                vertical-align: middle;
                
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
        ?>  
            <div style="text-align: center;">
                <a href="./emitirNota.php"><button type="button" class="btn btn-primary">Buscar novamente</button></a><br>
            </div>     
            <br>
        <?php   

            

            foreach($_SESSION['notaPedido'] as $dadosPedido){
                
                echo '<fieldset class="centro-borda">';
                    echo '<div class="centro">';
                        $idPedido = $dadosPedido[0];
                        echo'<h2 style="color: white;  text-align: center;">Dados da Entrega</h2><br>';
                        if($dadosPedido[2] == 'V') {echo '<p id="car">Pagamento: Confirmado</p>'; }
                        else {echo '<p id="car">Pagamento: Pendente</p>';}
                        if($dadosPedido[3] == 'E') {echo '<p id="car">Entrega: Confirmado</p>'; }
                        else {echo '<p id="car">Entrega: Pendente</p>';}
                        echo '<p id="car">Forma de Pagamento: '.$dadosPedido[5].'</p>';
                        echo '<p id="car">Data do Pedido: '.$dadosPedido[12].'</p>';
                        echo '<p id="car">Rua: '.$dadosPedido[6].'</p>';
                        echo '<p id="car">Número: '.$dadosPedido[7].'</p>';
                        echo '<p id="car">Bairro: '.$dadosPedido[8].'</p>';
                        echo '<p id="car">Cidade: '.$dadosPedido[9].'</p>';
                        echo '<p id="car">Referencia: '.$dadosPedido[10].'</p>';
                        if($dadosPedido[11] == 'V') {echo '<p id="car">Confirmação: Confirmado</p>'; }
                        else {echo '<p id="car">Confirmação: Pendente</p>';}
                        echo '<p id="car">Preço Total R$ '.$dadosPedido[4].'</p>';
                    echo '</div>';
                echo '</fieldset>';

            }
            ?>
            <br><h2 style="color: white;  text-align: center;">Dados do Pedido</h2><br>
            <table>
                <tr>
                    <th>Camisa</th>
                    <th>Nome</th>
                    <th>Nº Pedido</th>
                    <th>Quantidade</th>
                    <th>Cor</th>
                    <th>Sexo</th>
                    <th>Tamanho</th>
                    <th>Preço Unitário (R$)</th>
                </tr>
                
                    <?php
                        
                        $dados = $p->buscaPedidoCamisa($idPedido);
                        if(count($dados) > 0){
                            for($i=0; $i < count($dados); $i++){
                                echo "<tr>";
                                foreach ($dados[$i] as $k => $v) {
                                    if ($k == 'img') {
                                        
                                        echo '<td><img src="'.$v.'" height=auto; width = auto; style= "max-width:116.69px; max-height:127.661px;" ></td>';
                                        
                                    }else{
                                        echo '<td>'.$v.'</td>';
                                    }
                                }
                                echo "</tr>";
                            }
                        }else {
                            echo "A tabela não possui dados!";
                        }
                    ?> 
            </table>

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