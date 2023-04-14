let form =document.getElementById("formulario");
form.addEventListener('submit', comprobarEmail);

function comprobarEmail(evt){
    //paramos el submit
    evt.preventDefault();
   let email= document.querySelector('#email').value;

    cadena="email=" + email;
   $.ajax({
       type:"POST",
       url:"/citascocina/controlador/controladorCompruebaLogin.php",
       data:cadena
   }).done(function(respuesta){
    if (respuesta){
        //enviamos el submit
        form.submit();
    }else {
        document.getElementById('error').innerHTML="Email incorrecto";
    }
   });

}
