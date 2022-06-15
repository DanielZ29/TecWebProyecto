<?php
        $title = 'Mis TT';
        require_once '../includes/headerProfesor.php';
        require_once '../db/conn.php'; 
        require_once '../includes/auth_check.php';
       
        
        
        $informacion = $tt->getInformacionTTByEmail($_SESSION['username']);
        $directores = $tt->getDirectores($informacion['id_tt']);
        $sinodales = $tt->getSinodales($informacion['id_tt']);
    ?>

    <br><br>
    <h1 class="text-center">Mis TT</h1>

    <table class="table align-middle text-center mt-5">
        <tr> 
            <th>Titulo</th>
            <th>Resumen</th>
            <th>Alumno</th>
            <th colspan = "2">Acciones</th>
        </tr>
        <tr>
            <td><?php echo $informacion['nombre'] ?></td>
            <td><?php echo $informacion['email'] ?></td>
            <td><?php echo $informacion['boleta'] ?></td>
            <td><?php echo $informacion['telefono'] ?></td>
            <td colspan="2"><a href="editarCuenta.php?id=<?php echo $informacion['id_alumno'] ?>" class="btn btn-primary">Ver</a>
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
    

<br>
<br>
<br>



<?php require_once '../includes/footer.php'; ?> 