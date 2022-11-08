$(".tablaUsuarios tbody").on("click", ".btnEliminarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");

    Swal.fire({
        title: 'Quiere eliminar el usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "index.php?pagina=usuarios&idEliminarUsuario="+idUsuario;
        }
      })

})