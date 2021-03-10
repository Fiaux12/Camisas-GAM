<?php
	require 'conexao.php';
	require 'Pedido.class.php';
	$p = new Pedido();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Acompanhar Pedido</title>

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
        <div>
			<a href="index.php"><div><i class="fa fa-home">Home</i></div></a>
		</div>
        <h1 id="cad-log" class="cent" style="text-align: center;">Meus pedidos</h1>
        <h3 id="cad-log" class="cent" style="text-align: center;">Acompanhe seus pedidos aqui!</h3>
        <p id="cad-log">* Se o pagamento não for efetuado dentro de 3 dias o pedido será cancelado.</p>

        <form action="confirmaCliente.php" method="POST" >
            <table>
                <tr>
                    <th>Nº Pedido</th>
                    <th>Pagamento*</th>
                    <th>Entrega</th>
                    <th>Confirmar Entrega</th>
                    <th>Preço(R$)</th>
                    <th>Emitir Nota</th>

                </tr>
                
                    <?php
                        
                        $dados = $p->buscarPedido($_SESSION['idUsuario']);
                        if(count($dados) > 0){
                            for($i=0; $i < count($dados); $i++){
                                echo "<tr>";
                                foreach ($dados[$i] as $k => $v) {
                                    
                                    if($k == "id"){
                                        echo '<td>#'.$v.'</td>';  
                                        $idPedido = $v;  
                                        global $pdo;
                                        $sql = "SELECT confirmacaoCliente FROM Pedido WHERE id = '$idPedido';";
                                        $sql = $pdo->prepare($sql);
                                        $sql->execute();

                                        if($sql->rowCount() > 0){
                                            $dado = $sql->fetch();
                                            $valida = $dado['confirmacaoCliente'];
                                        }              
                                    }
                                    if($k == "preco"){
                                        echo '<td>'.$v.'</td>';                  
                                    }
                                    
                                    if($k == "status_pagamento"){
                                        if($v == 'X'){
                                            echo '<td>Pendente</td>'; 
                                        }elseif($v == 'V'){
                                            echo '<td>Confirmado </td>'; 
                                        }
                                    }
                                    if($k == "status_entrega"){
                                        if($v != 'E'){
                                            if($v == 'F'){
                                                echo '<td>Fabricando</td>'; 
                                            }elseif($v == 'A'){
                                                echo '<td>A caminho</td>'; 
                                            }elseif($v == 'S'){
                                                echo '<td>Saindo para entrega</td>'; 
                                            }elseif($v == 'X'){
                                                echo '<td>Esperando pagamento</td>';
                                            }    
                                            echo '<td>Aguandando entrega</td>';
                                        }elseif($v == 'E'){
                                            if($p->buscaConfirmacao($idPedido) == 'V'){
                                                echo '<td>Entregue</td>';
                                                echo '<td>Confirmado</td>';
                                            }else{
                                                if($valida == 'V'){
                                                    echo '<td>Confirmado</td>';
                                                    echo '<td>Confirmado</td>';
                                                }else{
                                                    echo '<td>Aguandando Confirmação</td>';
                                                    echo '<td><button  type="submit" name = "confirmaCliente" value = "'.$idPedido.'" class="btn btn-primary" >Chegou</button></td>';
                                                }
                                            }
                                        }
                                    }
                                }
                                echo '<td><a href="emitirNota.php">Emitir Nota Fiscal</a></td>';
                                echo "</tr>";
                            }
                        }
                    ?> 
            </table>
        </form>
        <div class="centro" style="width: 30%; display: table;">
            <div class="centro" style="display: table-row; height: 1px;">
                <div style="width: 1%; display: table-cell;">
                    <i class="fa fa-truck"></i>
                    </div>
                <div style="display: table-cell;">
                    <h3 id="cad-log" class="centro">Não se preocupe, nossos produtos são feitos e entregues com muito cuidado</h3>
                </div>
            </div>
        </div>
        <a href="https://streamlabs.com/glaucus120/tip" style="color:#252122;">doe pro Glaucus</a>
    </body>
</html>