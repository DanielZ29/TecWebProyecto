<?php

        $title = 'Editar Cuenta';
        require_once '../includes/headerProfesor.php';
        require_once '../includes/auth_check.php';
        require_once '../db/conn.php'; 

        $informacion = $profesores->getInfoDet($_SESSION['userid']);


        
    ?>

<br><br>
<h1 class="text-center">Editar Cuenta</h1>

<form method="post" action="../controladores/edicionCuentaProfesor.php">
    <input type="hidden" id="id_profesor" name="id_profesor" value="<?php echo $informacion['id_profesor']?>" />
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $informacion['nombre']?>" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" value="<?php echo $informacion['email']?>" id="email" aria-describedby="emailHelp" name="email">
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Telefono</label>
        <input type="tel" class="form-control" value="<?php echo $informacion['telefono']?>" id="telefono" name="telefono">
    </div>

    <div class="mb-3">
        <label for="password class="form-label">Contraseña</label>
        <input type="password" class="form-control" value="<?php echo $informacion['password']?>" id="password" name="password">
    </div>

    <div class="col-12 justify-content-center d-flex text-center mt-4">
        <button type="submit" name="submit" class="btn btn-success col-3 me-2">Actualizar Cambios</button>
        <a class="btn btn-secondary col-3" href="mainProfesor.php" role="button">Regresar</a>
    </div>
</form>
<br>
<br>
<br>

<?php require_once '../includes/footer.php'; ?>