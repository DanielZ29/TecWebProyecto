<?php

    require_once 'db/conn.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    $id = $_POST['id'];
    $nom = $_POST['nombre'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $bol = $_POST['boleta'];


    $result = $crud->editInfo($id,$nom,$email,$tel,$bol);

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