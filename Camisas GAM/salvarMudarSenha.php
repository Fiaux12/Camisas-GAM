<?php

    if (isset($_POST['confirmaSenha']) && !empty($_POST['confirmaSenha']) && isset($_POST['senhaNova']) && !empty($_POST['senhaNova'])) {

        require 'conexao.php';
        require 'Usuario.class.php';

        $u = new Usuario();

        $email = $_SESSION['emailUsuario'];
        $confirmaSenha = $_POST['confirmaSenha'];
        $senhaNova = $_POST['senhaNova'];

        if ($confirmaSenha == $senhaNova) {
            $u->mudarSenha($email, $senhaNova);
            header("Location: index.php");
        }else{
            $valida = 'invalido';
            $_SESSION['mudarSenha'] = $valida;
            header("Location: mudarSenha.php");
        }

        
    }

?>