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
 <img src="placeholder.jpg" alt="placeholder" align="left" width="360" height="640">
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
        <h3 id="cad-log">genero: Daora cor: Daora</h3>
      </div>
 <h1 id="cad-log">Coloque as opções para seu pedido</h1>
 <form action="" method="POST" class="centro">
		<fieldset>
          <p>
             <label id="cad-log">Tamanho</label>
             <select id = "myList">
               <option value = "1">PP</option>
               <option value = "2">P</option>
               <option value = "3">M</option>
               <option value = "4">G</option>
               <option value = "5">2G</option>
             </select>
          </p>
       </fieldset>
       		<fieldset>
          <p>
             <label id="cad-log">Sexo</label>
             <select id = "myList">
               <option value = "1">Masculino</option>
               <option value = "2">Feminino</option>
               <option value = "3">Unissex</option>
             </select>
          </p>
       </fieldset>
       <fieldset>
          <p>
             <label id="cad-log">Cor</label>
             <select id = "myList">
               <option value = "1">Preto</option>
               <option value = "2">Branco</option>
               <option value = "3">Rosa</option>
               <option value = "4">Azul</option>
               <option value = "5">Amarelo</option>
               <option value = "6">Vermelho</option>
               <option value = "7">Verde</option>
               <option value = "8">Roxo</option>
               <option value = "9">Laranja</option>
             </select>
          </p>
       </fieldset>
       <fieldset>
       	<div class="two-col">
    <div class="col1">
       <label id="cad-log">Quantidade</label> <input type="number" name="quantidade">
   </div>
   <div class="col2">
       <label id="cad-log">CEP(apenas números)</label> <input type="number" name="CEP">
       <button type="submit"><i class="fa fa-shopping-cart"></i>  Comprar<br>R$69,00</button>
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