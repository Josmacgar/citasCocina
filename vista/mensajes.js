let form =document.getElementById("formulario");
form.addEventListener('submit', comprobarEmail);

// como puedo implementar en un input  que al escribir con el teclado vaya 
//encontrando las ocurrencias en la base de datos y vaya mostrando las opciones en con php y javascript

function comprobarEmail(evt){
    //paramos el submit
    evt.preventDefault();
   let destinatario= document.querySelector('#destinatario').value;
   let contenido = document.querySelector('#contenido').value;
   let asunto = document.querySelector('#asunto').value;

    // comprobamos que los campos no estén vacíos
    if (destinatario.trim() === '' || contenido.trim() === ''||asunto.trim() === '') {
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