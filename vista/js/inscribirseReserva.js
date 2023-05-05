function suscripcion(reserva, elemento) {
    cadena = "reserva=" + reserva;
    $.ajax({
      type: "POST",
      url: "/citascocina/controlador/inscribirseReserva.php",
      data: cadena
    }).done(function(respuesta) {
      if (respuesta) {
        if (respuesta == 1) {
          elemento.style.backgroundColor = 'green';
        } else {
            alertify.success('Reservado');
          elemento.style.backgroundColor = 'red';
        }

        $('#contenedor').load(' #contenedor');
      } else {
        document.getElementById('error').innerHTML = "El email no existe";
      }
    });
  }
  


// function suscripcion(reserva) {
//     cadena="reserva=" + reserva;
//     // alert(reserva);
//     $.ajax({
//         type:"POST",
//         url:"/citascocina/controlador/inscribirseReserva.php",
//         data:cadena
//     }).done(function(respuesta){
//      if (respuesta){
//         let noUsu=document.querySelector('#suscripcion');
//          //enviamos el submit
//         //  form.submit();
//         if(respuesta==1){
//             noUsu.style.color='red';
//         }else{
//             noUsu.style.backgroundColor = 'red';
//         }
//         alert(respuesta);
//      }else {
//          document.getElementById('error').innerHTML="El email no existe";
//      }
//     });    
// }