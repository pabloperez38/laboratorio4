$(".tablaUsuarios tbody").on("click", ".btnEliminarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");
    var tipo = $(this).attr("tipo");

    if(tipo == 1)
    {
      Swal.fire({
					
        icon: "error",
        title: "No se puede eliminar un administrador",
        showConfirmButton: true,
        confirmButtonText:"Cerrar"
        });

    }else{

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

    }

})

//traer datos del usuario
$(".tablaUsuarios").on("click", ".btnVerUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

      console.log(respuesta);
			
			$(".nombreUsuario").html(respuesta["nombre"]);
			$(".email").html(respuesta["email"]);			

			if(respuesta["imagen"] != ""){

				$(".previsualizarEditar").attr("src", respuesta["imagen"]);

			}else{

				$(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");

			}

		}

	});

})