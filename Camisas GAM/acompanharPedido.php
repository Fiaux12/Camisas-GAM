<?php
	require 'conexao.php';
	require_once 'Pedido.class.php';
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
        <h1 id="cad-log" class="cent" style="text-align: center;">Meus pedidos</h1>
        <h3 id="cad-log" class="cent" style="text-align: center;">Acompanhe seus pedidos aqui!</h3>
        <table>
            <tr>
                <th>Nº Pedido</th>
                <th>Pagamento</th>
                <th>Entrega</th>
                <th>Preço(R$)</th>
                <th>Fazer Nota</th>
                <th>Cancelar Pedido</th>

            </tr>
            
                <?php
                    
                    $dados = $p->buscarPedido($_SESSION['idUsuario']);
                    if(count($dados) > 0){
                        for($i=0; $i < count($dados); $i++){
                            echo "<tr>";
                            foreach ($dados[$i] as $k => $v) {
                                
                                if($k == "id"){
                                echo '<td>#'.$v.'</td>';                  
                                }
                                if($k == "status_pagamento"){
                                    echo '<td>'.$v.'</td>';                  
                                }
                                if($k == "status_entrega"){
                                    echo '<td>'.$v.'</td>';                  
                                }
                                if($k == "preco"){
                                    echo '<td>'.$v.'</td>';                  
                                }
                            
                            }
                            echo "</tr>";
                        }
                    }
                ?> 
        </table>
        <div class="centro" style="width: 30%; display: table;">
            <div class="centro" style="display: table-row; height: 1px;">
                <div style="width: 2%; display: table-cell;">
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