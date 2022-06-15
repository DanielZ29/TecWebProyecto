<?php

        $title = 'View Records';
        require_once 'headerMain.php';
        require_once 'db/conn.php'; 
        require_once 'includes/auth_check.php';
       
        
        
        $results = $alumnos->getInfo($_SESSION['username']);
    ?>


        <table class="table">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                
                <th>Boleta</th>
                <th>Ver</th>
            </tr>
        
            <tr>
                <td><?php echo $results['id_alumno'] ?></td>
                <td><?php echo $results['nombre'] ?></td>
               
                <td><?php echo $results['boleta'] ?></td>
                <td><a href="view.php?id=<?php echo $results['id_alumno'] ?>" class="btn btn-primary">Ver</a></td>
                <td><a href="edit.php?id=<?php echo $results['id_alumno'] ?>" class="btn btn-warning">Editar</a></td>
                <td><a onclick="return confirm('¿Estas seguro de eliminar este ID?');" href="delete.php?id=<?php echo $results['id_alumno'] ?>" class="btn btn-danger">Eliminar</a></td>
            </tr>
        
        </table>



<br>
<br>
<br>



<?php require_once 'footerMain.php'; ?>  