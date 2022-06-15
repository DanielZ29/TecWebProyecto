<?php

        $title = 'Index';
        require_once 'headerMain.php';
        require_once 'db/conn.php'; 
    ?>

<h1 class="text-center"><?php echo $title ?> </h1>

<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-6 justify-content-center text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary btn-lg" href="controladores/loginAlumno.php" role="button">Alumno</a>
                <a class="btn btn-primary btn-lg" href="controladores/loginProfesor.php" role="button">Profesor</a>
            </div>
        </div>
        <div class="col">
        </div>
    </div>

    <?php include_once 'footerMain.php'?>