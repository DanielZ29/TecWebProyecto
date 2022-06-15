<?php

    require_once '../db/conn.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $boleta = $_POST['boleta'];
    $password = $_POST['password'];


    $result = $alumnos->editInfo($nombre,$email,$telefono,$boleta,$password);

    if($result){
        header("Location: ../views/mainTT.php");
    }
    else{
        echo 'error';
    }
}
else{
    echo 'error';
}


?>