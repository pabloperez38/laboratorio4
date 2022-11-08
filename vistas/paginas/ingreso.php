<form method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="ingresoEmail">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="ingresoPassword">
    </div>

    <?php

        $ingresoUsuario = new ControladorUsuarios();
        $ingresoUsuario -> ctrIngresarUsuario();
    
    ?>
    
    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>