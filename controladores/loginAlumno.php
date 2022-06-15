<?php
    $title = 'Login Alumnos'; 

    require_once '../includes/headerClean.php'; 
    require_once '../db/conn.php'; 
    
    
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = (trim($_POST['email']));
        $password = $_POST['password'];

        $result = $user->getUser($email,$password);
        
        if(!$result){
            echo '<div class="alert alert-danger">Usuario o Contraseña Incorreto. Intenta de nuevo </div>';
        }else{
            $_SESSION['username'] = $email;
            $_SESSION['userid'] = $result['id'];
            $_SESSION['name'] = $result['nombre'];
            header("Location: ../views/mainTT.php");
        }

    }
?>

<h1 class="text-center"><?php echo $title ?> </h1>

<br><br>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td><label for="email">Correo: * </label></td>
                <td><input type="text" name="email" class="form-control" id="email"
                        value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="password">Contraseña: * </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                </td>
            </tr>
        </table><br /><br />
        <input type="submit" value="Entrar" class="btn btn-primary btn-block"><br/>

    </form><br /><br /><br /><br />

    <?php include_once '../includes/footer.php'?>