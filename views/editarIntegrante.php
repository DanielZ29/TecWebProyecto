<?php

        $title = 'Editar Perfil';
        require_once '../includes/header.php';
        require_once '../db/conn.php'; 
        require_once '../includes/auth_check.php';

        $id = $_GET['id'];
        $informacion = $alumnos->getInfoDet($id);
        
    ?>


<h1 class="text-center">Editar Perfil</h1>

<form method="post" action="../controladores/edicionIntegrante.php">

    <input type="hidden" name="id_tt" value="<?php echo $informacion['id_tt']?>">
    <input type="hidden" name="password" value="">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $informacion['nombre']?>" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" value="<?php echo $informacion['email']?>" id="email" aria-describedby="emailHelp" name="email">
    </div>

    <div class="mb-3">
        <label for="boleta" class="form-label">Boleta</label>
        <input type="tel" class="form-control" value="<?php echo $informacion['boleta']?>" id="boleta" name="boleta">
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Telefono</label>
        <input type="tel" class="form-control" value="<?php echo $informacion['telefono']?>" id="telefono" name="telefono">
    </div>

    <div class="col-12 justify-content-center d-flex text-center mt-3">
        <button type="submit" name="submit" class="btn btn-success">Actualizar Cambios</button>
    </div>

</form>
<br>
<br>
<br>





<?php require_once '../includes/footer.php'; ?>