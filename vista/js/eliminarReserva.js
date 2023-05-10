// //funcion que elimina curriculum con ajax y jquery
// function EliminarNoticia(id) {
//   //datos que pamos mediante post
//   cadena = "id=" + id;

//   $.ajax({
//     type: "POST",
//     url: "/citascocina/controlador/controladorEliminarNoticias.php",
//     data: cadena,
//     success: function (r) {
//       //para que refresque bien importante el espacio en blanco
//       //en este caso al refrescar se descolocan las tarjetas
//       // $('#tarjetas').load(' #tarjetas');
//       alertify.success('Eliminado');
//       location.reload();
//     },
//   });
// }

//evento de change para modificar el baneado de los usuarios 
// $(document).ready(function () {
//   //con la linea comentada no funciona el recargar del jquery
//   // $(".baneo-select").change(function () {
//     $(document).on('click', '.eliminarNoticia', function(){
//     //obtenemos valores
//     var idNoticia = $(this).data("id");

//     $.ajax({
//       url: "/citascocina/controlador/controladorEliminarNoticias.php",
//       type: "POST",
//       data: {
//         idNoticia: idNoticia,
//       },
//       success: function (respuesta) {
//         alert('funciona jejeje');
//         // no se puede poner actualizar la tabla porque no actualiza en ajax
//         $('#contenedor').load(' #contenedor');
//       },
//       error: function () {
//         console.log("Ha ocurrido un error al enviar la petición AJAX");
//       },
//     });
//   });
// });
$(document).on('click', '.eliminarReserva', function(){
    //obtenemos valores
    var idReserva = $(this).data("id");
  
    //Agregamos una confirmación antes de eliminar la noticia
    if (confirm("¿Estás seguro de que quieres eliminar esta noticia?")) {
        $.ajax({
            url: "/citascocina/controlador/controladorEliminarReservas.php",
            type: "POST",
            data: {
                idReserva: idReserva,
            },
            success: function (respuesta) {
                alertify.success('Eliminado');
                $('#contenedor').load(' #contenedor');
  
            },
            error: function () {
                console.log("Ha ocurrido un error al enviar la petición AJAX");
            },
        });
    }
  });
  