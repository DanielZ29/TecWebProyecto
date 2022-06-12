<?php

        $title = 'Index';
        require_once 'includes/header.php';
        require_once 'db/conn.php'; 
    ?>

<!--
    Nombre
    Correo
    Telefono
    Boleta
    -->

<h1 class="text-center">login</h1>

<form method="post" action="success.php">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Telefono</label>
        <input type="tel" class="form-control" id="tel" name="tel">
    </div>

    <div class="mb-3">
        <label for="boleta" class="form-label">Boleta</label>
        <input type="tel" class="form-control" id="boleta" name="boleta">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <p>Selecciona una opción</p>
    <select class="form-select" name="representante" aria-label="Default select example">
        <option value="0">Alumno</option>
        <option value="1">Alumno Representante</option>
    </select>
    <br>


    <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
</form>
<br>
<br>
<br>



<?php require_once 'includes/footer.php'; ?>