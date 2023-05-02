// nota importante, las funciones validarComensales y validarComensalesVista y con las de cuerpo 
// estan separadas porque el evento keyup da conflicto con variables. 
// por eso hay una para datos y otra para mostrar errores

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



