<?php

$usuarios = ControladorUsuarios::ctrSeleccionarUsuarios(null, null);

?>
<table class="table table-striped tablaUsuarios">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Acciones</th>					
        </tr>
    </thead>
    <tbody>

    <?php 
    foreach($usuarios as $value){
    ?>
        <tr>
            <td><?php echo $value["nombre"]; ?></td>
            <td><?php echo $value["email"]; ?></td>
            <td><?php echo $value["fechaRegistro"]; ?></td>	
            <td><a href="index.php?pagina=editar&id=<?php echo $value["idUsuario"]; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btnEliminarUsuario" tipo="<?php echo $value["tipo"]; ?>" idUsuario="<?php echo $value["idUsuario"]; ?>"><i class="fa fa-trash"></i></button>
        </td>						
        </tr>

      <?php } ?>

    </tbody>
</table>

<?php

    $eliminarUsuario = new ControladorUsuarios();
    $eliminarUsuario -> ctrEliminarUsuario();
    
?>