<?php

        $title = 'Success';
        require_once 'includes/header.php'; 
        require_once 'db/conn.php';

        if(isset($_POST['submit'])){
            //extraemos los valores 
            $nom = $_POST['nombre'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $bol = $_POST['boleta'];

            $isSuccess = $crud->insertInfo($nom,$email,$tel,$bol);

            if($isSuccess){
                echo '<h1 class="text-center text-success">Has sido registrado</h1>';
            }
            else{
                echo '<h1 class="text-center text-danger">Hubo un error</h1>';
            }
            
        }
    ?>

    

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
            <?php echo $_POST['nombre'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_POST['email'];  ?>    
            </h6>
            <p class="card-text">
                Telefono: <?php echo $_POST['tel'];  ?>
            </p>
            <p class="card-text">
                Boleta: <?php echo $_POST['boleta'];  ?>
    
        </div>
    </div> 

    <br>
    <br>
    <br>
    <?php require_once 'includes/footer.php'; ?>