<?php

        $title = 'View Records';
        require_once 'includes/header.php';
        require_once 'db/conn.php'; 

        //obtener toda la info
        $results = $crud->getInfo();
    ?>


        <table class="table">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                
                <th>Boleta</th>
                <th>Ver</th>
            </tr>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $r['id_alumno'] ?></td>
                <td><?php echo $r['nombre'] ?></td>
               
                <td><?php echo $r['boleta'] ?></td>
                <td><a href="view.php?id=<?php echo $r['id_alumno'] ?>" class="btn btn-primary">Ver</a></td>
                <td><a href="edit.php?id=<?php echo $r['id_alumno'] ?>" class="btn btn-warning">Editar</a></td>
                <td><a onclick="return confirm('¿Estas seguro de eliminar este ID?');" href="delete.php?id=<?php echo $r['id_alumno'] ?>" class="btn btn-danger">Eliminar</a></td>
            </tr>
            <?php }?>
        </table>



<br>
<br>
<br>



<?php require_once 'includes/footer.php'; ?>  