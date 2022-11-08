<?php 

class Conexion{

	static public function conectar(){

		#PDO("nombre del servidor; nombre de la base de datos", "usuario", "contrase�a")

		$link = new PDO("mysql:host=localhost;dbname=sistema", 
			            "root", 
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}
