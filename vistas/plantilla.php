<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Ejemplo MVC</title>

	<!--=====================================
	PLUGINS DE CSS
	======================================-->	

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->	

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	<!-- Latest sweetalert2-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>


	<!--=====================================
	LOGOTIPO
	======================================-->

	<div class="container-fluid">
		
		<h3 class="text-center py-3">LOGO</h3>



	</div>

	<!--=====================================
	BOTONERA
	======================================-->

	<div class="container-fluid  bg-light">
		
		<div class="container">

			<ul class="nav nav-justified py-2 nav-pills">

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=registro">Registro</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
				</li>

				<li class="nav-item">
					<a class="nav-link active" href="index.php?pagina=usuarios">Inicio</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=salir">Salir</a>
				</li>

			</ul>

		</div>

	</div>

	<!--=====================================
	CONTENIDO
	======================================-->

	<div class="container-fluid">
		
		<div class="container py-5">

		<div class="row">

		<div class="col col-md-12">

		<?php 

			if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok")
			{
				$usuarioLogueado = ControladorUsuarios::ctrSeleccionarUsuarios("idUsuario", $_SESSION["idUsuario"]);
				echo "Bienvenido: ". $usuarioLogueado["nombre"];
			}

			
		?>
		
		</div>

		</div>

        <!-- $_GET["variable"] Variables que se pasan como par�metros V�a URL ( Tambi�n conocido como cadena de consulta a trav�s de la URL) Cuando es la primera variable se separa con ? las que siguen a continuaci�n se separan con & 
#ISSET: isset() Determina si una variable est� definida y no es NULL-->
		<?php 
        
        if(isset($_GET["pagina"])){

            if($_GET["pagina"] == "usuarios" ||
                $_GET["pagina"] == "registro" ||
				$_GET["pagina"] == "editar" ||
				$_GET["pagina"] == "salir" ||
                $_GET["pagina"] == "ingreso"
            ){

                include "paginas/".$_GET["pagina"].".php";

            }

        }else{
            include "paginas/ingreso.php";
        }
        
        ?>

		</div>

	</div>
	
	<script src="vistas/js/usuarios.js"></script>

</body>
</html>