<!doctype html>
<html lang="en">
  <head>
  	<title>Inicio Sesion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styleLogin.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/inicioSesion.jpg);">
			      </div>
                <div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex align-content-center">
			      		<div class="w-100 d-flex align-content-center">
			      			<h4 class="mb-4">Iniciar Sesión</h4>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="https://www.facebook.com/escomipnmx" target="_blank" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="https://twitter.com/escomunidad" target="_blank" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
                      <div class="form-check row col-12">
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioAlumno" value="alumno" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Alumno
                            </label>
                        </div>
                        
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioProfesor" value="profesor">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Profesor
                            </label>
                        </div>
                    </div>
                <form action="#" class="signin-form mt-3">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Usuario</label>
			      			<input type="text" class="form-control" placeholder="ejemplo@email.com" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Contraseña</label>
		              <input type="password" class="form-control" placeholder="**********" required>
		            </div>
		            <div class="form-group">
		            	<button id="botonAlumno" type="submit" class="form-control btn btn-primary rounded submit px-3">Iniciar como Alumno</button>
		            </div>
                    <div class="form-group">
		            	<button id="botonProfesor" style="display: none;" type="submit" class="form-control btn btn-primary rounded submit px-3">Iniciar como Profesor</button>
		            </div>
		            
		          </form>
		          <p class="text-center">¿No tienes una cuenta? <a data-toggle="tab" href="#signup">Registrate</a></p>
		        </div>
		      </div>
			</div>
			</div>
		</div>
	</section>

    <script src="js/inicioSesion.js"></script>
	</body>
</html>
