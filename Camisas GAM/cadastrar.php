<?php

    if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {

        require 'conexao.php';
        require 'Usuario.class.php';

        $u = new Usuario();
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tipoUsuario = 'cliente';
        $senha = $_POST['senha'];

        if($u->cadastro($nome, $email, $tipoUsuario, $senha) == true){
            if(isset($_SESSION['idUsuario'])){
                header("Location: index.html");
                
            }
        }else{

            header("Location: cadastrar.html");
        }

    }else{
        header("Location: cadastrar.html");
    }

?>