$(document).ready(function () {
  $(".rol-select").change(function () {
    //obtenemos valores
    var valorSeleccionado = $(this).val();
    var idUsuario = $(this).data("usu");


    $.ajax({
      url: "/citascocina/controlador/controladorRolUsuarios.php",
      type: "POST",
      data: {
        valor: valorSeleccionado,
        idUsuario: idUsuario,
      },
      success: function (respuesta) {
        // no se puede poner actualizar la tabla porque no actualiza en ajax
      },
      error: function () {
        console.log("Ha ocurrido un error al enviar la petición AJAX");
      },
    });
  });
});
