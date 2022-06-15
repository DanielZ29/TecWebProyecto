<?php

    require_once '../db/conn.php';
    require_once '../includes/headerProfesor.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $id_profesor = $_POST['id_profesor'];

    $result = $profesores->editInfo($id_profesor, $nombre,$email,$telefono,$password);

    if($result){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Tu cuenta ha sido modificada exitosamente',
        }).then(function() {
            window.location = '../views/mainProfesor.php';
        });
        </script>"; 
    }
    else{
        echo 'error';
    }
}
else{
    echo 'error';
}


?>