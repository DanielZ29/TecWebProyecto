<?php

        $title = 'Registrar Compañero';
        require_once '../includes/header.php';
        require_once '../includes/auth_check.php';
        require_once '../db/conn.php'; 
        
    ?>


<h1 class="text-center">Registrar Compañero</h1>

<form method="post" action="../controladores/registroCompañero.php">
    <input type="hidden" id="id_alumno" name="id"/>
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
        <label for="boleta" class="form-label">Boleta</label>
        <input type="tel" class="form-control" id="boleta" name="boleta">
    </div>

    <div class="col-12 d-flex justify-content-center">
        <button type="submit" name="submit" class="btn btn-success mt-3 col-2">Registrar</button>
    </div>
</form>
<br>
<br>
<br>


<?php require_once '../includes/footer.php'; ?>