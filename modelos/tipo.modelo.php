<?php 
class ModeloTipo{

static public function mdlSeleccionarTipo($tabla)
{

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

    $stmt->execute();

    return $stmt -> fetchAll();
		
		//$stmt->close();
//$stmt = null;

	}
}