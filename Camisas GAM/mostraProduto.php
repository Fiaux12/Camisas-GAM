<?php
  require 'conexao.php';
  require_once 'Camisa.class.php';
  $p = new Camisa();
?>

<!DOCTYPE html>
<html>
<head>
		<title>Produto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

	</head>
<body>

  <?php

    $dados = $p->buscaDadosLinha($_POST['identificador']);
    if(count($dados) > 0){
      for($i=0; $i < count($dados); $i++){
        foreach ($dados[$i] as $k => $v) {
          if($k == "img"){
            //echo $v;
            echo '<img src="'.$v.'" alt="placeholder" align="left" width="360" height="580">';
          }
        }
      }
    }
  ?>

 <div style="color: white; text-align: center;">
      <div class="centro">
        <h1 id="cad-log">
          <?php
            $dados = $p->buscaDadosLinha($_POST['identificador']);
            if(count($dados) > 0){
              for($i=0; $i < count($dados); $i++){
                foreach ($dados[$i] as $k => $v) {
                  if($k == "nome"){
                    echo $v;
                  }
                }
              }
            }
          ?>
        </h1>
      </div>
 </div>

 <h2 style="color: white;" id="cad-lo">Escolha as opções para seu pedido!</h2>
 
  <form action="addCarrinho.php" method="POST" class="centro">
		<fieldset>
          <p>
             <label id="cad-log">Tamanho</label>
             <select id = "myList" name="tamanho">
               <option value = "PP">PP</option>
               <option value = "P">P</option>
               <option value = "M">M</option>
               <option value = "G">G</option>
               <option value = "GG">GG</option>
               <option value = "XG">XG</option>

             </select>
          </p>
    </fieldset>
    <fieldset>
      <p>
          <label id="cad-log">Sexo</label>
          <select id = "myList" name="sexo">
            <option value = "Masculino">Masculino</option>
            <option value = "Feminino">Feminino</option>
            <option value = "Unissex">Unissex</option>
          </select>
      </p>
    </fieldset>
    <fieldset>
      <p>
          <label id="cad-log">Cor</label>
          <select id = "myList" name="cor">
            <option value = "Preto">Preto</option>
            <option value = "Branco">Branco</option>
            <option value = "Rosa">Rosa</option>
            <option value = "Azul">Azul</option>
            <option value = "Amarelo">Amarelo</option>
            <option value = "Vermelho">Vermelho</option>
            <option value = "Verde">Verde</option>
            <option value = "Roxo">Roxo</option>
            <option value = "Laranja">Laranja</option>
          </select>
      </p>
    </fieldset>
    <fieldset>
    
    <div class="two-col">
      <div class="col1">
        <label id="cad-log">Quantidade</label> <input type="number" name="quantidade" value="1">
      </div>
      <div class="col2">
          <?php
            $dados = $p->buscaDadosLinha($_POST['identificador']);
            if(count($dados) > 0){
              for($i=0; $i < count($dados); $i++){
                foreach ($dados[$i] as $k => $v) {
                  if($k == "id"){
                    $idCamisa = $v;
                  }
                  if($k == "preco"){

                    echo '<button type = "submit" name = "idCamisa" value="'.$idCamisa.'"><i class="fa fa-shopping-cart"></i>  Comprar<br>R$'.$v.'</button>';
										
                  }
                }
              }
            }
          ?>
      </div>
    </div>
       	</fieldset>
  </form>
  <div class="centro" style="width: 30%; display: table;">
    <div class="centro" style="display: table-row; height: 1px;">
      <div style="width: 2%; display: table-cell;">
        <i class="fa fa-truck"></i>
      </div>
      <div class="centro" style="display: table-cell;">
        <p id="cad-log">O frete é grátis, não se preocupe</p>
      </div>
    </div>
  </div>
      </body>
</html>