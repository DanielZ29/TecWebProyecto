<?php
    if(!isset($_SESSION['username'])){
        header("Location: ../controladores/loginAlumno.php");
    }
?>