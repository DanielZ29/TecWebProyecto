<?php
        require_once 'db/conn.php'; 
        if(!$_GET['id']){
            echo 'error';
        }else{
            $id = $_GET['id'];

            $result = $crud->deleteInfo($id);
            if($result)
            {
                header("Location: viewrecords.php");
            }
            else{
                echo '';
            }
        }
        
    ?>