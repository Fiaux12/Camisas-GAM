<?php

    @session_start();

    $banco = 'GAM';
    $localhost = '127.0.0.1';
    $charset = 'utf8mb4';
    $user = '2018951950';
    $pass = 'coltec2020';

    global $pdo;

    try {
        $pdo = new PDO("mysql:dbname=".$banco."; host=".$localhost, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo 'erro ao conectar com BD: ' . $e->getMessage();
        exit;
    }
    
?>
