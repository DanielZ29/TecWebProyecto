<?php include_once 'includes/session.php'?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto - <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>


<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">ESCOM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewrecords.php">Ver Perfiles</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-nav ml-auto">
                    <?php 
              if(!isset($_SESSION['username'])){
          ?>
                    <a class="nav-item nav-link" href="loginAlumno.php">Login <span class="sr-only"></span></a>
                    <?php } else { ?>
                    <a class="nav-item nav-link" href="#"><span>Hola <?php echo $_SESSION['username'] ?></span> <span
                            class="sr-only"></span></a>
                    <a class="nav-item nav-link" href="logoutAlumno.php">Logout <span class="sr-only"></span></a>
                    <?php } ?>
                </div>
            </div>
        </nav>