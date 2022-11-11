<?php 

require 'conexion.php';

class ModeloUsuarios{

static public function mdlSeleccionarUsuarios($tabla, $item, $valor)
{
	
	if($item == null && $valor == null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt -> fetchAll();
		
		//$stmt->close();
//$stmt = null;

	}else{

		#bindParam() Vincula una variable de PHP a un par�metro de sustituci�n con nombre o de signo de interrogaci�n correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt -> fetch();
	}
}
	/*=============================================
	Registro
	=============================================*/

	static public function mdlRegistroUsuario($tabla, $datos){

		#statement: declaraci�n

		#prepare() Prepara una sentencia SQL para ser ejecutada por el m�todo PDOStatement::execute(). La sentencia SQL puede contener cero o m�s marcadores de par�metros con nombre (:name) o signos de interrogaci�n (?) por los cuales los valores reales ser�n sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los par�metros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password, imagen) VALUES (:nombre, :email, :password, :imagen)");

		#bindParam() Vincula una variable de PHP a un par�metro de sustituci�n con nombre o de signo de interrogaci�n correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		//$stmt->close();

		//$stmt = null;	

	}

	/*=============================================
	Actualizar Registro
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password, tipo = :tipo WHERE idUsuario= :idUsuario");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
		$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		//$stmt->close();

		$stmt = null;	

	}
	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function mdlEliminarUsuarios($tabla, $valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		//$stmt->close();

		$stmt = null;	

	}
}