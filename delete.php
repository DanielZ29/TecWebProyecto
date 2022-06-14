<?php
        require_once 'db/conn.php';
        require_once 'includes/auth_check.php'; 
        if(!$_GET['id']){
            echo 'error';
        }else{
            $id = $_GET['id'];

            $result = $alumnos->deleteInfo($id);
            if($result)
            {
                header("Location: viewrecords.php");
            }
            else{
                echo '';
            }
        }
        
    ?>