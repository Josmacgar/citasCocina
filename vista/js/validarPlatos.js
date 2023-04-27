// nota importante, las funciones validarTitulo y validarTituloVista y con las de cuerpo 
// estan separadas porque el evento keyup da conflicto con variables. 
// por eso hay una para datos y otra para mostrar errores

//funcion que valida la condicion del titulo
function validarNombre() {
    let titulo = document.querySelector('#nombre').value;
    if(titulo.length < 3){
        return false;
    } else {
        return true;
    }
}
//funcion que muestra error en titulo
function validarNombreVista() {
    let titulo = document.querySelector('#nombre');
    let errortitulo = document.querySelector('#errorNombre');
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
validarNombreVista();

//funcion que valida la condicion del cuerpo
function validarImagen() {
    let titulo = document.querySelector('#imagen').value;
    if(titulo.length < 5){
        return false;
    } else {
        return true;
    }
} 
//funcion que muestra error en titulo
function validarImagenVista() {
    let titulo = document.querySelector('#imagen');
    let errortitulo = document.querySelector('#errorImagen');
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
validarImagenVista();

//funcion la cual es comprobada por onsubmit que recoge las variables y devuelve true o false
function validarFormulario() {
    let nombre = validarNombre();
    let imagen = validarImagen();
    if(nombre==false || imagen==false){
        return false;
    }else{
        return true;
    }
}



