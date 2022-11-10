<?php

class ControladorUsuarios{

	/*=============================================
	Login de usuario
	=============================================*/
	static public function ctrIngresarUsuario(){

		if(isset($_POST["ingresoEmail"])){

			$encriptar = crypt($_POST["ingresoPassword"], '$2a$07$gongkosiosefopenguolgphst$');
			$tabla = "usuarios";

			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloUsuarios::mdlSeleccionarUsuarios($tabla, $item, $valor);

			if(is_array($respuesta) && $_POST["ingresoEmail"] == $respuesta["email"] && $encriptar == $respuesta["password"]){
				
				$_SESSION["iniciarSesion"] = "ok";
				$_SESSION["idUsuario"] = $respuesta["idUsuario"];

				echo '<script>			
					
					
					window.location = "index.php?pagina=usuarios";
					

				</script>';

			}else
			{
				echo '<script>

				Swal.fire({
					
					icon: "success",
					title: "Usuario o contraseña inválidos",
					showConfirmButton: true,
					confirmButtonText:"Cerrar"
				  }).then(function(result){
					if(result.value){
						window.location = "index.php";
					}
				  });

				</script>';
			}


		}else{



		}

	}

    /*=============================================
	Seleccionar Registros
	=============================================*/

	static public function ctrSeleccionarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlSeleccionarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}
/*=============================================
	Registro
	=============================================*/

	static public function ctrRegistroUsuario(){

		if(isset($_POST["nombre"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]))
			{
			 //validar no existe email

			$item = "email";
			$valor = $_POST["email"];

			$usuario = ControladorUsuarios::ctrSeleccionarUsuarios($item, $valor);
		
			if(!$usuario){

			$password = crypt($_POST["password"], '$2a$07$gongkosiosefopenguolgphst$');

			$tabla = "usuarios";

			$datos = array("nombre" => $_POST["nombre"],
				           "email" => $_POST["email"],
				           "password" => $password);

			$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=usuarios";

				</script>';

			}
		}else{

			echo '<script>

				Swal.fire({
					
					icon: "error",
					title: "El email ya existe en la BD",
					showConfirmButton: true,
					confirmButtonText:"Cerrar"
				  }).then(function(result){
					if(result.value){
						window.location = "index.php?pagina=registro";
					}
				  });

				</script>';


		}
		}else{

			echo '<script>

				Swal.fire({
					
					icon: "error",
					title: "No se permiten caracteres especiales en el nombre",
					showConfirmButton: true,
					confirmButtonText:"Cerrar"
				  }).then(function(result){
					if(result.value){
						window.location = "index.php?pagina=registro";
					}
				  });

				</script>';

		}

		}

	}

/*=============================================
	Editar
	=============================================*/

	static public function ctrActualizarUsuario(){

		if(isset($_POST["editarNombre"])){

			if($_POST["editarPassword"] != ""){			

				$password = crypt($_POST["editarPassword"], '$2a$07$gongkosiosefopenguolgphst$');

			}else{

				$item = "idUsuario";
				$valor = $_POST["idUsuario"];

				$usuario = ControladorUsuarios::ctrSeleccionarUsuarios($item, $valor);

				$password = $usuario["password"];
			}


			$tabla = "usuarios";

			$datos = array("idUsuario" => $_POST["idUsuario"],
							"nombre" => $_POST["editarNombre"],
				           "email" => $_POST["editarEmail"],
				           "tipo" => $_POST["tipo"],
				           "password" => $password);

			$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $datos);

			return $respuesta;


		}


	}

/*=============================================
	Eliminar Registro
	=============================================*/
	public function ctrEliminarUsuario(){

		if(isset($_GET["idEliminarUsuario"])){

			$tabla = "usuarios";
			$valor = $_GET["idEliminarUsuario"];

			$respuesta = ModeloUsuarios::mdlEliminarUsuarios($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>

				Swal.fire({
					
					icon: "success",
					title: "El usuario se eliminó correctamente",
					showConfirmButton: true,
					confirmButtonText:"Cerrar"
				  }).then(function(result){
					if(result.value){
						window.location = "index.php?pagina=usuarios";
					}
				  });

				</script>';

			}

		}

	}
}