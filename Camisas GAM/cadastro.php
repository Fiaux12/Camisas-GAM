<?php

    $servername = "127.0.0.1";
    $username = "2018951950";
    $password = "coltec2020";
    $dbname = "GAM";

    //cria conexão
    $conexao = new mysqli($servername, $username, $password, $dbname);
    //checa a canexao
    if ($conexao->connect_error) {
      die("Connection failed: " . $conexao->connect_error);
    }

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $tipoUsuario = $_GET['tipoUsuario'];

    $sql = "INSERT into Conta(nome, tipo, email, senha) values ('{$nome}', '{$tipoUsuario}', '{$email}', '{senha}')";


    $con = mysqli_connect('127.0.0.1', '2018951950', 'coltec2020', 'GAM');
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo("Cadastro feito com sucesso!");
    echo ("<br>");
    echo " - Name: " . $nome . " email: " . $email . "<br>";

?>