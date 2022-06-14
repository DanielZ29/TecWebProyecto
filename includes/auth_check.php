<?php
    if(!isset($_SESSION['username'])){
        header("Location: loginAlumno.php");
    }
?>