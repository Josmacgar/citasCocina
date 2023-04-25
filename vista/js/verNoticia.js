// padre.appendChild(document.createElement('h2').appendChild(document.createTextNode('titulo'+datos)))

//funcion que muestra la noticia al hacer click
function verNoticia(title,body,date) {
  let titulo = document.getElementById("idTitulo");
  let tituloAnterior = titulo.firstChild;
  if (tituloAnterior) {
    titulo.removeChild(tituloAnterior);
  }
  titulo.appendChild(document.createTextNode(title ));

  //cuerpo
  let cuerpo = document.getElementById("idCuerpo");
  let cuerpoAnterior = cuerpo.firstChild;
  if (cuerpoAnterior) {
    cuerpo.removeChild(cuerpoAnterior);
  }
  cuerpo.appendChild(document.createTextNode(body ));

    //fecha
    let fecha = document.getElementById("idFecha");
    let fechaAnterior = fecha.firstChild;
    if (fechaAnterior) {
      fecha.removeChild(fechaAnterior);
    }
    fecha.appendChild(document.createTextNode(date ));
}
