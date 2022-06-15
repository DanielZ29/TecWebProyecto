<?php
        $title = 'Mis TT';
        require_once '../includes/headerProfesor.php';
        require_once '../db/conn.php'; 
        require_once '../includes/auth_check.php';

        $id = $_SESSION['userid'];
        
       
        $tts = $tt->getMisTrabajosTerminales($_SESSION['userid']);
        
        
        
    ?>

    <br><br>
    <h1 class="text-center">Mis TT</h1>

    <table class="table align-middle text-center mt-5">
        <tr> 
            <th>Titulo</th>
            <th>Resumen</th>
            <th>Alumno Representante</th>
            <th colspan = "2">Acciones</th>
        </tr>
        <?php while($i = $tts->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $i['titulo'] ?></td>
            <td><?php echo $i['resumen'] ?></td>
            <td><?php echo $i['nombre'] ?></td>
            <td colspan="2"><a href="verTT.php?id=<?php echo $i['id_tt'] ?>" class="btn btn-primary">Ver</a>
        </tr>
        <?php }?>
    </table>
    

<br>
<br>
<br>



<?php require_once '../includes/footer.php'; ?> 