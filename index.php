<?php

require_once './controladores/plantilla.controlador.php';

require_once './controladores/usuarios.controlador.php';
require_once './controladores/tipo.controlador.php';

require_once './modelos/usuarios.modelo.php';
require_once './modelos/tipo.modelo.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrMostrarPlantilla();