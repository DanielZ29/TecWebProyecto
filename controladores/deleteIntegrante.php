<?php
        require_once '../db/conn.php';
        require_once '../includes/header.php'; 

        if(!isset($_SESSION['username'])){
            header("Location: ../controladores/loginAlumno.php");
        }

        $id = $_GET['id'];

        $result = $alumnos->deleteInfo($id);
        if($result)
        {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'El alumno ha sido borrado exitosamente',
            }).then(function() {
                window.location = '../views/mainEquipo.php';
            });
            </script>"; 
        }
        else{
            echo '';
        }
        
        
?>