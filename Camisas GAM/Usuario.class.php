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
            session_start();
            $_SESSION['idUsuario'] = $dado['id'];
            $_SESSION['emailUsuario'] = $dado['email'];
            $_SESSION['nomeUsuario'] = $dado['nome'];

            $idConta = $dado['id'];
            $dataH = date('d/m/y h:i:s');
            echo $dataH;

            $sql2 = "INSERT INTO Login(data, id_conta) values ('$dataH', '$idConta')";
            $sql2 = $pdo->prepare($sql2);
            $sql2->execute();

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

            return false;
            
        }else{
            $sql = "INSERT into Conta(nome, tipo, email, senha) values ('{$nome}', '{$tipoUsuario}', '{$email}', '{$senha}')";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            return true;
        }        
    }

    public function mudarSenha($email, $senhaNova){

        global $pdo;

        $sql = "UPDATE Conta SET senha = '$senhaNova' WHERE email = '$email';";
        $sql = $pdo->prepare($sql);
        $sql->execute();

    }
}

?>