//funcion que elimina curriculum con ajax y jquery
function EliminarNoticia(id) {
  //datos que pamos mediante post
  cadena = "id=" + id;

  $.ajax({
    type: "POST",
    url: "/citascocina/controlador/controladorEliminarNoticias.php",
    data: cadena,
    success: function (r) {
      //para que refresque bien importante el espacio en blanco
      //en este caso al refrescar se descolocan las tarjetas
      // $('#tarjetas').load(' #tarjetas');
      alertify.success('Eliminado');
      location.reload();
    },
  });
}
