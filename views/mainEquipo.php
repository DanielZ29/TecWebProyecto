<?php
        $title = 'Equipo';
        require_once '../includes/header.php';
        require_once '../db/conn.php'; 
        require_once '../includes/auth_check.php';
       
        
        
        $results = $alumnos->getInfo($_SESSION['username']);
        $informacion = $tt->getInformacionTTByEmail($_SESSION['username']);
        $integrantes = $alumnos->getIntegrantes($informacion['id_tt']);
        $numeroIntegrantes = $tt->getNumeroIntegrantes($informacion['id_tt']);
        $numInt = $numeroIntegrantes->fetch(PDO::FETCH_ASSOC);
    ?>

    <br><br>
    <h1 class="text-center">Gestionar Equipo</h1>

    <table class="table align-middle text-center mt-5">
        <tr> 
            <th>Nombre</th>
            <th>Correo</th>
            <th>Boleta</th>
            <th>Teléfono</th>
            <th colspan = "2">Acciones</th>
        </tr>
        <tr>
            <td><?php echo $results['nombre'] ?></td>
            <td><?php echo $results['email'] ?></td>
            <td><?php echo $results['boleta'] ?></td>
            <td><?php echo $results['telefono'] ?></td>
            <td colspan="2"><a href="editarCuenta.php?id=<?php echo $results['id_alumno'] ?>" class="btn btn-dark">Cuenta</a>
            </td>    
        </tr>
        <?php while($i = $integrantes->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $i['nombre'] ?></td>
            <td><?php echo $i['email'] ?></td>
            <td><?php echo $i['boleta'] ?></td>
            <td><?php echo $i['telefono'] ?></td>
            <td colspan="2"><a href="editarIntegrante.php?id=<?php echo $i['id_alumno'] ?>" class="btn btn-primary">Editar</a>
            <a href="../controladores/deleteIntegrante.php?id=<?php echo $i['id_alumno'] ?>" class="btn btn-danger">Borrar</a></td>
        </tr>
        <?php }?>
    </table>

    <?php  if($numInt['COUNT(*)']<4){  ?>
        <div class="col-12 justify-content-center d-flex text-center mt-4">
            <a class="btn btn-primary btn-success" href="registrarCompañero.php" role="button">Agregar Integrante</a>
        </div>
    <?php } ?>
        
        

<br>
<br>
<br>



<?php require_once '../includes/footer.php'; ?> 