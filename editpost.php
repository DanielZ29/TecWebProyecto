<?php

    require_once 'db/conn.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    $id_alumno = $_POST['id_alumno'];
    $nom = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $boleta = $_POST['boleta'];
    $representante = $_POST['representante'];
    $password = $_POST['password'];


    $result = $alumnos->editInfo($id_alumno,$nom,$email,$telefono,$boleta,$representante,$password);

    if($result){
        header("Location: viewrecords.php");
    }
    else{
        echo 'error';
    }
}
else{
    echo 'error';
}


?>