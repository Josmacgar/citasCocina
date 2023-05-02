// padre.appendChild(document.createElement('h2').appendChild(document.createTextNode('titulo'+datos)))

//funcion que muestra la noticia al hacer click
function verReserva(comensales,precio,date) {
    let titulo = document.getElementById("idFecha");
    let tituloAnterior = titulo.firstChild;
    if (tituloAnterior) {
      titulo.removeChild(tituloAnterior);
    }
    titulo.appendChild(document.createTextNode(date ));
  
    //comensales
    let cuerpo = document.getElementById("idComensales");
    let cuerpoAnterior = cuerpo.firstChild;
    if (cuerpoAnterior) {
      cuerpo.removeChild(cuerpoAnterior);
    }
    cuerpo.appendChild(document.createTextNode(comensales ));
  
      //precio
      let fecha = document.getElementById("idPrecio");
      let fechaAnterior = fecha.firstChild;
      if (fechaAnterior) {
        fecha.removeChild(fechaAnterior);
      }
      fecha.appendChild(document.createTextNode(precio +'€'));
  }
  