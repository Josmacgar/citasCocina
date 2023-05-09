// nota importante, las funciones validarComensales y validarComensalesVista y con las de cuerpo 
// estan separadas porque el evento keyup da conflicto con variables. 
// por eso hay una para datos y otra para mostrar errores
const selectPlatos = document.getElementById('selectPlatos');
// const botonMas = document.getElementById('botonMas');
const listaPlatos = document.getElementById('listaPlatos');

// Crear una matriz para almacenar los platos seleccionados
const platosSeleccionados = [];
document.querySelector('#botonMas').addEventListener('click',prueba);
function prueba(){
// Obtener referencias a los elementos DOM que necesitamos


// Agregar un controlador de eventos para el botón "botonMas"

  // Obtener el valor y el texto del option seleccionado
  const selectedOption = selectPlatos.options[selectPlatos.selectedIndex];
  const selectedValue = selectedOption.value;
  const selectedText = selectedOption.text;
  
  // Comprobar si el plato ya está en la matriz de platos seleccionados
  const platoYaSeleccionado = platosSeleccionados.some(function(plato) {
    return plato.id === selectedValue;
  });
  
  // Si el plato ya está en la matriz de platos seleccionados, mostrar un alert y no hacer nada
  if (platoYaSeleccionado) {
    alert('Este plato ya está en la lista');
    return;
  }
  
  // Agregar el plato seleccionado a la matriz de platos seleccionados
  platosSeleccionados.push({id: selectedValue, nombre: selectedText});
  
  // Actualizar la lista de platos en la página
  listaPlatos.innerHTML = '';
  
  // añadimos un titulo a la lista
  const tituloLista = document.createElement('h5');
  tituloLista.textContent = 'Platos:';
  listaPlatos.appendChild(tituloLista);
  
  // Agregar cada plato seleccionado a la lista de platos
  for (let i = 0; i < platosSeleccionados.length; i++) {
    const plato = platosSeleccionados[i];
    const li = document.createElement('li');
    li.textContent = plato.nombre;
    li.classList.add('list-group-item');
    listaPlatos.appendChild(li);
  }
}








//funcion que valida la condicion del titulo
function validarComensales() {
    let comensales = document.querySelector("#comensales").value;
    let expresion = /^[0-9,$]*$/;
    if (expresion.test(comensales)) {
      return true;
    } else {
      return false;
    }
  }

//funcion que muestra error en titulo
function validarComensalesVista() {
    let titulo = document.querySelector('#comensales');
    let errortitulo = document.querySelector('#errorComensales');
    titulo.addEventListener("keyup", function () {
        let nombre = titulo.value;
        let expresion = /[0-9]/;
        if(expresion.test(nombre)){
            errortitulo.setAttribute("class","error");
            titulo.setAttribute("class","form-control border  border-danger");

        }else{
            errortitulo.setAttribute("class","d-none");
            titulo.setAttribute("class","form-control");

        }
    });
}
validarComensalesVista();

//funcion que valida la condicion del cuerpo
function validarCuerpo() {
    let titulo = document.querySelector('#contenido').value;
    if(titulo.length < 5){
        return false;
    } else {
        return true;
    }
} 

//funcion que muestra error en cuerpo
function validarCuerpoVista() {
    let titulo = document.querySelector('#contenido');
    let errortitulo = document.querySelector('#errorContenido');
    titulo.addEventListener("keyup", function () {
        let nombre = titulo.value;
        if(nombre.length<3){
            errortitulo.setAttribute("class","error");
            titulo.setAttribute("class","form-control border  border-danger");

        }else{
            errortitulo.setAttribute("class","d-none");
            titulo.setAttribute("class","form-control");

        }
    });
}
validarCuerpoVista();

//funcion la cual es comprobada por onsubmit que recoge las variables y devuelve true o false
function validarFormulario() {
    let titulo = validarComensales();
    let cuerpo = validarCuerpo();
    if(titulo==false || cuerpo==false){
        return false;
    }else{
        return true;
    }
}






