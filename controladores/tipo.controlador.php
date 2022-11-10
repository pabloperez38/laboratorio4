<?php

class ControladorTipo{

    static public function ctrSeleccionarTipo(){

		$tabla = "tipo";

		$respuesta = ModeloTipo::mdlSeleccionarTipo($tabla);

		return $respuesta;

	}
}