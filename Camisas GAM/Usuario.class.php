<?php

class Usuario{

    public function login($email, $senha){

        global $pdo;

        $sql = "SELECT * FROM Conta WHERE email = '$email' AND senha = '$senha';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            echo $dado['email'];
            echo $dado['senha'];

            $_SESSION['idUsuario'] = $dado['id'];

            return true;
        }else{
            return false;
        }
    
    }

    public function cadastro($nome, $email, $tipoUsuario, $senha){

        global $pdo;

        $sql = "SELECT * FROM Conta WHERE email = '$email';";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            echo $dado['email'];

            $_SESSION['idUsuario'] = $dado['id'];

            return false;
            
        }else{
            $sql = "INSERT into Conta(nome, tipo, email, senha) values ('{$nome}', '{$tipoUsuario}', '{$email}', '{$senha}')";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            return true;
        }        
    }
}

?>