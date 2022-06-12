<?php

        $title = 'View Records';
        require_once 'includes/header.php';
        require_once 'db/conn.php'; 

        //obtener la id
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $crud->getInfoDet($id);
        } else{
            echo "<h1 class='text-danger'>Por favor checa los detalles y vuelve de nuevo</h1>";
        }
        
    ?>

    <br>
    <br>
    <br>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
            <?php echo $result['nombre'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['email'];  ?>    
            </h6>
            <p class="card-text">
                Telefono: <?php echo $result['telefono'];  ?>
            </p>
            <p class="card-text">
                Boleta: <?php echo $result['boleta'];  ?>
    
        </div>
    </div>


<br>
<br>
<br>



<?php require_once 'includes/footer.php'; ?> 