// nota importante, las funciones validarComensales y validarComensalesVista y con las de cuerpo
// estan separadas porque el evento keyup da conflicto con variables.
// por eso hay una para datos y otra para mostrar errores

// Agregar un controlador de eventos para el botón "enviar"
document.getElementById("enviar").addEventListener("click", function () {
  // Verificar si el formulario es válido
  if (validarFormulario()) {
    //valores
    const comensales = document.getElementById("comensales");
    const precio = document.getElementById("precio");
    const fecha = document.getElementById("date");
    const modos = document.getElementById("modo");
    const reserva = document.getElementById("idReserva");
    // Obtener los valores de los campos de entrada
    const numComensales = comensales.value;
    const precioTotal = precio.value;
    const fechaReserva = fecha.value;
    const modo = modos.value;
    const idReserva = reserva.value;

    // Obtener los IDs de los platos seleccionados como una cadena separada por comas
    const platosIDs = platosSeleccionados.map((plato) => plato.id).join(",");

    // Crear un objeto de datos para enviar al servidor
    const datos = {
      comensales: numComensales,
      precio: precioTotal,
      fecha: fechaReserva,
      platos: platosIDs,
      modo: modo,
      idReserva: idReserva,
    };
    // Enviar la petición AJAX
    $.ajax({
      type: "POST",
      url: "/citascocina/controlador/controladorRegistroReservas.php",
      data: datos,
    }).done(function (respuesta) {
      if (respuesta) {
        //enviamos el submit
        window.location.href ="../vista/reservas.php";
      } else {
        alert('Fallido');
      }
    });
  }
});

const selectPlatos = document.getElementById("selectPlatos");
// const botonMas = document.getElementById('botonMas');
const listaPlatos = document.getElementById("listaPlatos");
// Crear una matriz para almacenar los platos seleccionados
const platosSeleccionados = [];

document.querySelector("#botonMas").addEventListener("click", añadirPlato);
function añadirPlato() {
  // Obtener el valor y el texto del option seleccionado
  const selectedOption = selectPlatos.options[selectPlatos.selectedIndex];
  const selectedValue = selectedOption.value;
  const selectedText = selectedOption.text;

  // Comprobar si el plato ya está en la matriz de platos seleccionados
  const platoYaSeleccionado = platosSeleccionados.some(function (plato) {
    return plato.id === selectedValue;
  });

  // Si el plato ya está en la matriz de platos seleccionados, mostrar un alert y no hacer nada
  if (platoYaSeleccionado) {
    alert("Este plato ya está en la lista");
    return;
  }

  // Agregar el plato seleccionado a la matriz de platos seleccionados
  platosSeleccionados.push({ id: selectedValue, nombre: selectedText });

  // Actualizar la lista de platos en la página
  listaPlatos.innerHTML = "";

  // añadimos un titulo a la lista
  const tituloLista = document.createElement("h5");
  tituloLista.textContent = "Platos:";
  listaPlatos.appendChild(tituloLista);

  // Agregar cada plato seleccionado a la lista de platos
  for (let i = 0; i < platosSeleccionados.length; i++) {
    const plato = platosSeleccionados[i];
    const li = document.createElement("li");
    li.textContent = plato.nombre;
    li.classList.add("list-group-item");
    listaPlatos.appendChild(li);
  }
}

//funcion que valida la condicion del titulo
function validarComensales() {
  let comensales = document.querySelector("#comensales").value;
  let expresion = /^\d{1,4}$/;
  if (expresion.test(comensales)) {
    return true;
  } else {
    return false;
  }
}

//funcion que muestra error en titulo
function validarComensalesVista() {
  let titulo = document.querySelector("#comensales");
  let errortitulo = document.querySelector("#errorComensales");
  titulo.addEventListener("keyup", function () {
    let nombre = titulo.value;
    let expresion = /^\d{1,4}$/;
    if (expresion.test(nombre)) {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    } else {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border  border-danger");
    }
  });
}
validarComensalesVista();

//funcion que valida la condicion del cuerpo
function validarPrecio() {
  let precio = document.querySelector("#precio").value;
  let expresion = /^\d{1,3}(\,\d{3})*(\.\d+)?$/;
  if (expresion.test(precio)) {
    return true;
  } else {
    return false;
  }
}


//funcion que muestra error en cuerpo
function validarPrecioVista() {
  let titulo = document.querySelector("#precio");
  let errortitulo = document.querySelector("#errorPrecio");
  titulo.addEventListener("keyup", function () {
    let nombre = titulo.value;
    let expresion = /^\d{1,3}(\,\d{3})*(\.\d+)?$/;
    if (expresion.test(nombre)) {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    } else {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border  border-danger");
    }
  });
}
validarPrecioVista();

//funcion la cual es comprobada por onsubmit que recoge las variables y devuelve true o false
function validarFormulario() {
    let titulo = validarComensales();
    let cuerpo = validarPrecio();
    if (titulo == false || cuerpo == false) {
      return false;
    } else {
      return true;
    }
}
