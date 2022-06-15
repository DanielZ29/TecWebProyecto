<?php

    require_once '../db/conn.php';
    require_once '../includes/header.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $boleta = $_POST['boleta'];
    $password = $_POST['password'];

    $result = $alumnos->editInfo($nombre,$email,$telefono,$boleta,$password);

    if($result){
        
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El alumno ha sido modificado exitosamente',
            }).then(function() {
                window.location = '../views/mainEquipo.php';
            });
            </script>"; 
            
        
    }
    else{
        echo 'error 1';
    }
}
else{
    echo 'error';
}
