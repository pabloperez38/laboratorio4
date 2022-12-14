<?php

$item = "idUsuario";
$valor = $_GET["id"];

$usuario = ControladorUsuarios::ctrSeleccionarUsuarios($item, $valor);

?>

<form method="post">

    <div class="form-group">
        <label for="email">Nombre:</label>
        <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" name="editarNombre">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" name="editarEmail">
    </div>

    <input type="hidden" value="<?php echo $usuario["idUsuario"]; ?>" name="idUsuario">

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="editarPassword">
    </div>

    <div class="form-group" >

    <select name="tipo" class="form-control">

        <option value="">Seleccionar</option>

        <?php $tipo = ControladorTipo::ctrSeleccionarTipo(); 

        foreach ($tipo as $key => $value) { ?>

            <option <?php if($usuario["tipo"] == $value["idTipo"]) { ?> selected <?php } ?> value="<?php echo $value["idTipo"]; ?>"><?php echo $value["nombre"] ?></option>

        <?php } ?>

        </select>

    <?php

    $editarUsuario = new ControladorUsuarios();
    $editarUsuario -> ctrActualizarUsuario();
    
    ?>
    
    <button type="submit" class="btn btn-primary">Actualizar</button>
    
</form>