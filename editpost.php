<?php

    require_once 'db/conn.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    $id = $_POST['id'];
    $nom = $_POST['nombre'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $bol = $_POST['boleta'];
    $representante = $_POST['representante'];
    $password = $_POST['password'];


    $result = $crud->editInfo($id,$nom,$email,$tel,$bol,$representante,$password);

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