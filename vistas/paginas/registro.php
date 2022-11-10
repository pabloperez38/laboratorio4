<form method="post" id="formRegistro">

    <div class="form-group">
        <label for="email">Nombre:</label>
        <input type="text" class="form-control" name="nombre">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="form-group">
        <label for="password">Repetir Password:</label>
        <input type="password" class="form-control" name="confirm_password">
    </div>

    <div class="form-group" >

    <select name="tipo" class="form-control">

        <option value="">Seleccionar</option>

        <?php $tipo = ControladorTipo::ctrSeleccionarTipo(); 

        foreach ($tipo as $key => $value) { ?>

             <option value="<?php echo $value["idTipo"] ?>"><?php echo $value["nombre"] ?></option>
        
        <?php } ?>
        
    </select>

    </div>

    <?php

    $crearUsuario = new ControladorUsuarios();
    $crearUsuario -> ctrRegistroUsuario();
    
    ?>
    
    <button type="submit" class="btn btn-primary">Registrar</button>
    
</form>