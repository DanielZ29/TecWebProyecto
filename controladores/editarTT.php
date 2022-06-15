<?php

    require_once '../db/conn.php';
    require_once '../includes/header.php';

if(isset($_POST['submit'])){
    //extraemos los valores 
    
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $archivo = $_POST['archivo'];
    $id_tt = $_POST['id_tt'];


    $result = $tt->updateTT($titulo,$resumen,$archivo, $id_tt);

    if($result){
        
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El TT ha sido modificado exitosamente',
            }).then(function() {
                window.location = '../views/mainTT.php';
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


?>