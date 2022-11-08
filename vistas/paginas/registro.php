<form method="post">

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
        <input type="password" class="form-control" name="password">
    </div>

    <?php

    $crearUsuario = new ControladorUsuarios();
    $crearUsuario -> ctrRegistroUsuario();
    
    ?>
    
    <button type="submit" class="btn btn-primary">Registrar</button>
    
</form>