<?php

        $title = 'Index Profesores';
        require_once '../includes/header.php';
        require_once '../db/conn.php'; 
    ?>

<!--
    Nombre
    Correo
    Telefono
    Boleta
    -->

<h1 class="text-center">Registo Profesores</h1>

<form method="post" action="controladores/registroProfesores.php">
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
        <input type="tel" class="form-control" id="telefono" name="telefono">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="is_externo" onchange = "showCV()">
        <label class="form-check-label" for="flexCheckDefault">
            ¿Es Externo?
        </label>
    </div>

    <div class="mb-3" id="divCV" style="display: none;">
        <label id="cv" for="password" class="form-label" value ="CV">Curriculum Vitae</label>
        <input type="" class="form-control" name="">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
</form>
<br>
<br>
<br>



<?php require_once '../includes/footer.php'; ?>