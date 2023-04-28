$(document).on('click', '.eliminarPlato', function(){
    //obtenemos valores
    var idPlato = $(this).data("id");
  
    //Agregamos una confirmación antes de eliminar la noticia
    if (confirm("¿Estás seguro de que quieres eliminar esta noticia?")) {
        $.ajax({
            url: "/citascocina/controlador/controladorEliminarPlatos.php",
            type: "POST",
            data: {
                idPlato: idPlato,
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