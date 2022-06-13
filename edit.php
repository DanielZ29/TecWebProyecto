<?php

        $title = 'Editar Perfil';
        require_once 'includes/header.php';
        require_once 'db/conn.php'; 


        if(!isset($_GET['id'])){
            echo 'error';
        }
        else{
            $id = $_GET['id'];
            $perfil = $crud->getInfoDet($id);
        
    ?>


<h1 class="text-center">Editar</h1>

<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $perfil['id_alumno']?>" />
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $perfil['nombre']?>" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" value="<?php echo $perfil['email']?>" id="email" aria-describedby="emailHelp" name="email">
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Telefono</label>
        <input type="tel" class="form-control" value="<?php echo $perfil['telefono']?>" id="tel" name="tel">
    </div>

    <div class="mb-3">
        <label for="boleta" class="form-label">Boleta</label>
        <input type="tel" class="form-control" value="<?php echo $perfil['boleta']?>" id="boleta" name="boleta">
    </div>

    <p>Selecciona una opción</p>
    <select class="form-select" name="representante" aria-label="Default select example">
        <option value="0">Alumno</option>
        <option value="1">Alumno Representante</option>
    </select>
    <br>

    <div class="mb-3">
        <label for="password class="form-label">Contraseña</label>
        <input type="password" class="form-control" value="<?php echo $perfil['password']?>" id="password" name="password">
    </div>

    <button type="submit" name="submit" class="btn btn-success">Actualizar Cambios</button>
</form>
<br>
<br>
<br>

<?php  } ?>



<?php require_once 'includes/footer.php'; ?>