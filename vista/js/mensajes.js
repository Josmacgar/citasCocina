let form =document.getElementById("formulario");
form.addEventListener('submit', comprobarEmail);



function comprobarEmail(evt){
    //paramos el submit
    evt.preventDefault();
   let destinatario= document.querySelector('#destinatario').value;
   let contenido = document.querySelector('#contenido').value;
   let asunto = document.querySelector('#asunto').value;

    // comprobamos que los campos no estén vacíos y que el email no sea el del admin
    if (destinatario.trim() === '' || contenido.trim() === ''||asunto.trim() === ''||destinatario=='admin@admin.com') {
        alert('Por favor, completa todos los campos');
    }else{
        alert('enviado');
        form.submit();
    }

//     cadena="destinatario=" + destinatario+"contenido="+contenido;
//    $.ajax({
//        type:"POST",
//        url:"/citascocina/controlador/controladorMensajes.php",
//        data:cadena
//    }).done(function(respuesta){
//     if (respuesta){
//         //enviamos el submit
        
//     }else {
//         document.getElementById('error').innerHTML="El email no existe";
//     }
//    });

}

// el codigo envia una peticion con un evento que al escribir se actualiza y va generando listas de usuarios
$(document).ready(function() {
    //por defecto venia input, yo lo cambie a keyup
    $('#destinatario').on('keyup', function() {
        var input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: '/citascocina/controlador/buscarUsuarios.php',
                method: 'POST',
                data: {input: input},
                success: function(response) {
                    $('#resultadoBusqueda').html(response);
                }
            });
        } else {
            $('#resultadoBusqueda').html('');
        }
    });
});
function copyToInput(email) {
    var input = document.getElementById('destinatario');
    input.value = email;
}


