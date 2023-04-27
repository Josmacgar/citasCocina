//evento de change para modificar el rol de los usuarios 
$(document).ready(function () {
  // $(".rol-select").change(function () {
    $(document).on('change', '.rol-select', function(){
    //obtenemos valores
    var valorSeleccionado = $(this).val();
    var idUsuario = $(this).data("usu");
    var modo = 'rol';

    $.ajax({
      url: "/citascocina/controlador/controladorRolBaneoUsuarios.php",
      type: "POST",
      data: {
        valor: valorSeleccionado,
        idUsuario: idUsuario,
        modo,
      },
      success: function (respuesta) {
        $('.table').load(' .table');        
      },
      error: function () {
        console.log("Ha ocurrido un error al enviar la petición AJAX");
      },
    });
  });
});

//evento de change para modificar el baneado de los usuarios 
$(document).ready(function () {
  //con la linea comentada no funciona el recargar del jquery
  // $(".baneo-select").change(function () {
    $(document).on('change', '.baneo-select', function(){
    //obtenemos valores
    var valorSeleccionado = $(this).val();
    var idUsuario = $(this).data("usu");
    var modo = 'baneo';

    $.ajax({
      url: "/citascocina/controlador/controladorRolBaneoUsuarios.php",
      type: "POST",
      data: {
        valor: valorSeleccionado,
        idUsuario: idUsuario,
        modo,
      },
      success: function (respuesta) {
        // no se puede poner actualizar la tabla porque no actualiza en ajax
        $('.table').load(' .table');
      },
      error: function () {
        console.log("Ha ocurrido un error al enviar la petición AJAX");
      },
    });
  });
});
