$(document).ready(function () {
    $(".baneo-select").change(function () {
      //obtenemos valores
      var valorSeleccionado = $(this).val();
      var idUsuario = $(this).data("usu");
  
      $.ajax({
        url: "/citascocina/controlador/controladorBaneadoUsuarios.php",
        type: "POST",
        data: {
          valor: valorSeleccionado,
          idUsuario: idUsuario,
        },
        success: function (respuesta) {
          // Aquí puedes hacer algo con la respuesta del servidor
          // alert(respuesta);
          $('#table').load(' #table');
        },
        error: function () {
          console.log("Ha ocurrido un error al enviar la petición AJAX");
        },
      });
    });
  });
  