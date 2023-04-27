$(document).ready(function () {
  $(".rol-select").change(function () {
    //obtenemos valores
    var valorSeleccionado = $(this).val();
    var idUsuario = $(this).data("usu");
    var banear = $(this).data("banear");

    $.ajax({
      url: "/citascocina/controlador/controladorRolNoticias.php",
      type: "POST",
      data: {
        valor: valorSeleccionado,
        idUsuario: idUsuario,
        baneado: banear,
      },
      success: function (respuesta) {
        // Aquí puedes hacer algo con la respuesta del servidor
        // alert(respuesta);
        $('#main').load(' #main');
      },
      error: function () {
        console.log("Ha ocurrido un error al enviar la petición AJAX");
      },
    });
  });
});
