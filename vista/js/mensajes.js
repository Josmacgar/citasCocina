let form = document.getElementById("formulario");
form.addEventListener("submit", comprobarEmail);

function comprobarEmail(evt) {
  //paramos el submit
  evt.preventDefault();
  let destinatario = document.querySelector("#destinatario").value;
  let contenido = document.querySelector("#contenido").value;
  let asunto = document.querySelector("#asunto").value;

  // comprobamos que los campos no estén vacíos y que el email no sea el del admin
  if (
    destinatario.trim() === "" ||
    contenido== "" ||
    asunto.trim() === "" ||
    destinatario == "admin@admin.com"
  ) {
    alert("Por favor, completa todos los campos");
  } else {
    form.submit();
    alertify.success("Enviado");
  }
}

// el codigo envia una peticion con un evento que al escribir se actualiza y va generando listas de usuarios
$(document).ready(function () {
  //por defecto venia input, yo lo cambie a keyup
  $("#destinatario").on("keyup", function () {
    var input = $(this).val();
    if (input.length > 0) {
      $.ajax({
        url: "/citascocina/controlador/buscarUsuarios.php",
        method: "POST",
        data: { input: input },
        success: function (response) {
          $("#resultadoBusqueda").html(response);
        },
      });
    } else {
      $("#resultadoBusqueda").html("");
    }
  });
});

//funcion que copia el texto de la lista al input
function copyToInput(email) {
  var input = document.getElementById("destinatario");
  input.value = email;
}

//funcion que muestra un mensaje en un modal
function verMensaje(remitentes, asuntos, cuerpos, date) {
  //remitente
  let remitente = document.getElementById("remitente");
  let remitenteAnterior = remitente.firstChild;
  if (remitenteAnterior) {
    remitente.removeChild(remitenteAnterior);
  }
  remitente.appendChild(document.createTextNode(remitentes));

  //asunto
  let asunto = document.getElementById("titulo");
  let asuntoAnterior = asunto.firstChild;
  if (asuntoAnterior) {
    asunto.removeChild(asuntoAnterior);
  }
  asunto.appendChild(document.createTextNode(asuntos));

  //cuerpo
  let cuerpo = document.getElementById("contenido");
  let cuerpoAnterior = cuerpo.firstChild;
  if (cuerpoAnterior) {
    cuerpo.removeChild(cuerpoAnterior);
  }
  cuerpo.appendChild(document.createTextNode(cuerpos));

  //fecha
  let fecha = document.getElementById("idFecha");
  let fechaAnterior = fecha.firstChild;
  if (fechaAnterior) {
    fecha.removeChild(fechaAnterior);
  }
  fecha.appendChild(document.createTextNode(date));
}
