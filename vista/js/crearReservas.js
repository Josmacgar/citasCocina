// // Obtener referencias a los elementos DOM que necesitamos
// const selectPlatos = document.getElementById('selectPlatos');
// const botonMas = document.getElementById('botonMas');
// const listaPlatos = document.getElementById('listaPlatos');

// // Crear una matriz para almacenar los platos seleccionados
// const platosSeleccionados = [];

// // Agregar un controlador de eventos para el botón "botonMas"
// botonMas.addEventListener('click', function() {
//   // Obtener el valor y el texto del option seleccionado
//   const selectedOption = selectPlatos.options[selectPlatos.selectedIndex];
//   const selectedValue = selectedOption.value;
//   const selectedText = selectedOption.text;
  
//   // Comprobar si el plato ya está en la matriz de platos seleccionados
//   const platoYaSeleccionado = platosSeleccionados.some(function(plato) {
//     return plato.id === selectedValue;
//   });
  
//   // Si el plato ya está en la matriz de platos seleccionados, mostrar un alert y no hacer nada
//   if (platoYaSeleccionado) {
//     alert('Este plato ya está en la lista');
//     return;
//   }
  
//   // Agregar el plato seleccionado a la matriz de platos seleccionados
//   platosSeleccionados.push({id: selectedValue, nombre: selectedText});
  
//   // Actualizar la lista de platos en la página
//   listaPlatos.innerHTML = '';
  
//   // añadimos un titulo a la lista
//   const tituloLista = document.createElement('h5');
//   tituloLista.textContent = 'Platos:';
//   listaPlatos.appendChild(tituloLista);
  
//   // Agregar cada plato seleccionado a la lista de platos
//   for (let i = 0; i < platosSeleccionados.length; i++) {
//     const plato = platosSeleccionados[i];
//     const li = document.createElement('li');
//     li.textContent = plato.nombre;
//     li.classList.add('list-group-item');
//     listaPlatos.appendChild(li);
//   }
// });
