// padre.appendChild(document.createElement('h2').appendChild(document.createTextNode('titulo'+datos)))

function verNoticia(id,title,cuerpo) {
    // alert(noticias);
  let titulo = document.getElementById("idTitulo");
  let tituloAnterior = titulo.firstChild;
  if (tituloAnterior) {
    titulo.removeChild(tituloAnterior);
  }
  titulo.appendChild(document.createTextNode("titulo"+title ));
}
