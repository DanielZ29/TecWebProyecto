<?php

    require_once '../db/conn.php';

    if(isset($_POST['submit'])){
        //extraemos los valores 
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password = $_POST['password'];
        if(!isset($_POST['is_externo'])){
            $is_externo = 0;
        }else{
            $is_externo = $_POST['is_externo'];
        }
        if(!isset($_POST['cv'])){
            $cv = 0;
        }else{
            $cv = $_POST['cv'];
        }

        $isSuccess = $profesores->registrarProfesores($nombre,$email,$telefono,$password,$is_externo,$cv);

        if($isSuccess){
            header("Location: ../views/mainProfesores.php");
            exit();
        }
        else{
            echo '<h1 class="text-center text-danger">Hubo un error</h1>';
        }
        
    }
?>