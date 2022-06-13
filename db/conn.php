<?php
    $host = '127.0.0.1';
    $db = 'tt_db';
    $user = 'root';
    $pass = '';
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";


    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    } catch(PDOException $e){
    
        throw new PDOException($e->getMessage());
    }

    require_once 'alumnos.php';
    require_once 'profesores.php';
    $alumnos = new alumnos($pdo);
    $profesores = new profesores($pdo);
?>    