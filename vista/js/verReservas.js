// padre.appendChild(document.createElement('h2').appendChild(document.createTextNode('titulo'+datos)))

//funcion que muestra la noticia al hacer click
function verReserva(comensales, precio, date, nombres, tipos, imagenes) {
  let titulo = document.getElementById("idFecha");
  let tituloAnterior = titulo.firstChild;
  if (tituloAnterior) {
    titulo.removeChild(tituloAnterior);
  }
  titulo.appendChild(document.createTextNode(date));

  //comensales
  let cuerpo = document.getElementById("idComensales");
  let cuerpoAnterior = cuerpo.firstChild;
  if (cuerpoAnterior) {
    cuerpo.removeChild(cuerpoAnterior);
  }
  cuerpo.appendChild(document.createTextNode(comensales));

  //precio
  let fecha = document.getElementById("idPrecio");
  let fechaAnterior = fecha.firstChild;
  if (fechaAnterior) {
    fecha.removeChild(fechaAnterior);
  }
  fecha.appendChild(document.createTextNode(precio + "€"));

  // ----------------------
  let nombre = nombres.split(",");
  let tipo = tipos.split(",");
  let imagen = imagenes.split(",");
  // console.log(nombre);
  // console.log(nombre);
  let cuerpoTabla = document.getElementById("crear"); // obtener la tabla donde se agregarán las filas

  for (let i = 0; i < nombre.length; i++) {
    // crear una nueva fila
    let row = document.createElement("tr");

    // crear y agregar la primera columna con el nombre
    let nombreCol = document.createElement("td");
    nombreCol.appendChild(document.createTextNode(nombre[i]));
    nombreCol.classList.add("centrar-vertical");
    row.appendChild(nombreCol);

    // crear y agregar la tercera columna con el tipo
    // if para que escriba al final Plato si no es un postre
    let tipoText = tipo[i];
    if (tipo[i] === "1" || tipo[i] === "2") {
      tipoText += " plato";
    }
    let tipoCol = document.createElement("td");
    tipoCol.appendChild(document.createTextNode(tipoText));
    tipoCol.classList.add("centrar-vertical");
    row.appendChild(tipoCol);

    // crear y agregar la segunda columna con una imagen
    let imagenCol = document.createElement("td");
    // Aquí podrías agregar una imagen específica para cada elemento del array 'nombre'
    // o bien, una imagen genérica para todas las filas
    let foto = document.createElement("img");
    foto.src = imagen[i];
    foto.classList.add("imagenTabla");
    imagenCol.appendChild(foto);
    row.appendChild(imagenCol);

    // agregar la fila a la tabla
    cuerpoTabla.appendChild(row);
  }
}

// se añade el boton click para que actualice la pagina al cerrar al modal porque se quedaban los platos almacenados
let elementosCerrarModal = document.querySelectorAll('#cerrarModal, #cerrar');

elementosCerrarModal.forEach(function(elemento) {
  elemento.addEventListener('click', function() {
    location.reload();
  });
});

