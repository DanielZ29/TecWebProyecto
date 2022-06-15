<?php
    session_start();
    require_once '../db/conn.php';

    if(isset($_POST['submit'])){
        //extraemos los valores 
        $nombre = $_POST['nombre'];
        $emailIntegrante = $_POST['email'];
        $telefono = $_POST['telefono'];
        $boleta = $_POST['boleta'];
        

        $isSuccess = $tt->registrarCompañero($nombre,$emailIntegrante,$telefono,$boleta, $_SESSION['username']);

        if($isSuccess){
            header("Location: ../views/mainEquipo.php");
            exit();
        }
        else{
            echo '<h1 class="text-center text-danger">Hubo un error</h1>';
        }
        
    }
?>
