$().ready(function() {

    // validate signup form on keyup and submit
    $("#formRegistro").validate({
        rules: {
            nombre: "required",
            email: {
                required: true,
                email: true
            },       
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            tipo: "required"         
            
        },
        messages: {
            nombre: "Ingresar nombre",

            email: {
                required: "Ingrese un email",
                email: "Ingrese un email válido"
            },
            password: {
                required: "Ingrese un password",
                minlength: "Mínimo 5 caracteres"
            },
            confirm_password: {
                required: "Re ingrese un password",
                minlength: "Mínimo 5 caracteres",
                equalTo: "Las contraseñas no coinciden"
            },
            tipo: "Seleccione un tipo de usuario"
        }
    });

})