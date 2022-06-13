<?php

    require_once '../db/conn.php';

    if(isset($_POST['submit'])){
        //extraemos los valores 
        $nom = $_POST['nombre'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $bol = $_POST['boleta'];
        $password = $_POST['password'];

        $isSuccess = $alumnos->registrarRepresentante($nom,$email,$tel,$bol,$password);

        if($isSuccess){
            header("Location: ../views/mainAlumno.php");
            exit();
        }
        else{
            echo '<h1 class="text-center text-danger">Hubo un error</h1>';
        }
        
    }
?>

    

