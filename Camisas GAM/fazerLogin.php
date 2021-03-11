<?php

    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {

        require 'conexao.php';
        require 'Usuario.class.php';

        $u = new Usuario();
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if($u->login($email, $senha) == true){
            if(isset($_SESSION['idUsuario'])){
            	if($_SESSION['tipoUsuario'] == 'cliente'){
                	header("Location: index.php");
                }elseif ($_SESSION['tipoUsuario'] == 'admTI') {
                	header("Location: admTI.php");
                }elseif ($_SESSION['tipoUsuario'] == 'adm') {
                    header("Location: adm.php");
                }
            }
        }else{
            $login = 'invalido';
            $_SESSION['login']=$login;
            header("Location: logar.php");
        }

    }else{
        header("Location: logar.php");
    }

?>
