function suscripcion(reserva, elemento,comensales) {
  cadena = "reserva=" + reserva + "&comensales=" + comensales;
  $.ajax({
      type: "POST",
      url: "/citascocina/controlador/inscribirseReserva.php",
      data: cadena
    }).done(function(respuesta) {
      if (respuesta) {
        if (respuesta == 1) {
          elemento.className = 'btn btn-success';
        } else if(respuesta==2) {
          alert('No quedan platos en la reserva');
        }else{
          alertify.success('Reservado');
          elemento.className = 'btn btn-danger';
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