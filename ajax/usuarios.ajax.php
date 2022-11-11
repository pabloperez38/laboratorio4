<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxVerUsuario{

/*=============================================
TRAER USuario
=============================================*/	

	public $idUsuario;

	public function ajaxTraerUsuario(){

		$item = "idUsuario";
		$valor = $this->idUsuario;	

		$respuesta = ControladorUsuarios::ctrSeleccionarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["idUsuario"])){

	$traeUsuario = new AjaxVerUsuario();
	$traeUsuario -> idUsuario = $_POST["idUsuario"];
	$traeUsuario -> ajaxTraerUsuario();

}