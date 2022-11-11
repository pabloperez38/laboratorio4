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
            <button class="btn btn-info btnVerUsuario" data-toggle="modal" data-target="#modalVerUsuario" idUsuario="<?php echo $value["idUsuario"]; ?>"><i class="fa fa-eye"></i></button>
            <button class="btn btn-danger btnEliminarUsuario" tipo="<?php echo $value["tipo"]; ?>" idUsuario="<?php echo $value["idUsuario"]; ?>"><i class="fa fa-trash"></i></button>
        </td>						
        </tr>

      <?php } ?>

    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalVerUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title nombreUsuario" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h4 class="email"></h4>
       <img src="" class="previsualizarEditar" width="200" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php

    $eliminarUsuario = new ControladorUsuarios();
    $eliminarUsuario -> ctrEliminarUsuario();
    
?>