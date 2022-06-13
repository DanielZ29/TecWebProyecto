<?php

        $title = 'Index';
        require_once 'includes/header.php';
        require_once 'db/conn.php'; 

       
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = strtolower(trim($_POST['email']));
        $password = $_POST['password'];
      

        $result = $user->getUser($email,$password);
        if(!$result){
            echo '<div class="alert alert-danger">Nombre de Usuario o Contraseña Incorrecto. Intenta de nuevo</div>';
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $result['id'];
            header("Location: viewrecords.php");
        }

    }
    ?>

<h1 class="text-center"><?php echo $title ?> </h1>
   
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td><label for="email">Username: * </label></td>
                <td><input type="text" name="email" class="form-control" id="email" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="password">Password: * </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                </td>
            </tr>
        </table><br/><br/>
        <input type="submit" value="Login" class="btn btn-primary btn-block"><br/>
        <a href="#"> Forgot Password </a>
            
    </form><br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?>