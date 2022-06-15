<?php

        $title = 'Editar Perfil';
        require_once '../includes/header.php';
        require_once '../db/conn.php'; 
        require_once '../includes/auth_check.php';


       $informacion = $tt->getInformacionTTByEmail($_SESSION['username']);
       $directores = $tt->getDirectores($informacion['id_tt']);
       $sinodales = $tt->getSinodales($informacion['id_tt']);
        
    ?>

<br><br>
<h1 class="text-center">Mi Trabajo Terminal</h1>

<form method="post" action="../controladores/editarTT.php">

    <input type="hidden" name="id_tt" value="<?php echo $informacion['id_tt']?>">

    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" value="<?php echo $informacion['titulo']?>" id="titulo" name="titulo">
    </div>

    <div class="mb-3">
        <label for="resumen" class="form-label">Resumen</label>
        <textarea class="form-control" id="resumen" name="resumen" value="<?php echo $informacion['resumen']?>" rows="3" placeholder="Máximo 200 caracteres"></textarea>
    </div>

    <div class="row col-12 d-flex justify-content-center">
        <div class=" col-6 mb-3">
            <label for="tel" class="form-label">Número de Registro</label>
            <input type="tel" class="form-control" value="2022-2_<?php echo $informacion['id_tt']?>" disabled>
        </div>

        <div class=" col-6 mb-3">
            <label for="tel" class="form-label">Estado</label>
            <?php if($informacion['estado'] == 0){
                $estado = "En revisión";
            }elseif($informacion['estado'] == 1){
                $estado = "Aprobado";
            }else{
                $estado = "Denegado";
            }
            ?>
            <input type="tel" class="form-control" value= "<?php echo $estado?>" disabled>
        </div>
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Director(es)</label>
        <?php while($d = $directores->fetch(PDO::FETCH_ASSOC)) {?>
        <input type="tel" class="form-control" value="<?php echo $d['nombre']?>" disabled>
        <?php }?>
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Sinodal(es)</label>
        <?php while($s = $sinodales->fetch(PDO::FETCH_ASSOC)) {?>
        <input type="tel" class="form-control" value="<?php echo $s['nombre']?>" disabled>
        <?php }?>
    </div>

    <div class="mb-3">
        <label for="archivo" class="form-label">Archivo del Trabajo Terminal</label>
        <input class="form-control" type="file" id="archivo" name="archivo" value="<?php echo $informacion['archivo']?>">
    </div>

    <div class="col-12 d-flex justify-content-center mt-4">
        <button type="submit" name="submit" class="btn btn-success col-3 me-2">Actualizar Cambios</button>
        <button type="submit" name="submit" class="btn btn-primary col-3">Generar Comprobante</button>
    </div>

</form>
<br>
<br>
<br>





<?php require_once '../includes/footer.php'; ?>