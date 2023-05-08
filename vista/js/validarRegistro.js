// nota importante, las funciones validarNombre y validarNombreVista y con las de cuerpo
// estan separadas porque el evento keyup da conflicto con variables.
// por eso hay una para datos y otra para mostrar errores

let global =false;

// NOMBRE
function validarNombre() {
  let titulo = document.querySelector("#nombre").value;
  if (titulo.length < 3) {
    return false;
  } else {
    return true;
  }
}
function validarNombreVista() {
  let titulo = document.querySelector("#nombre");
  let errortitulo = document.querySelector("#errorNombre");
  titulo.addEventListener("keyup", function () {
    let nombre = titulo.value;
    if (nombre.length < 3) {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border  border-danger");
    } else {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    }
  });
}
validarNombreVista();

// EMAIL
function validarEmail() {
  let email = document.querySelector("#email").value;
  let expresion = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
  if (expresion.test(email)) {
    return true;
  } else {
    return false;
  }
}
function validarEmailVista() {
  let titulo = document.querySelector("#email");
  let errortitulo = document.querySelector("#errorEmail");
  titulo.addEventListener("keyup", function () {
    let email = titulo.value;
    let expresion = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    if (expresion.test(email)) {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    } else {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border border-danger");
    }
  });
}
validarEmailVista();

// PASSWORD
function validarPassword() {
  let password = document.querySelector("#password").value;
  let expresion = /(?=.*[a-z])(?=.*[A-Z])/;
  if (expresion.test(password)) {
    return true;
  } else {
    return false;
  }
}
function validarPasswordVista() {
  let titulo = document.querySelector("#password");
  let errortitulo = document.querySelector("#errorContraseña");
  titulo.addEventListener("keyup", function () {
    let password = titulo.value;
    let expresion = /(?=.*[a-z])(?=.*[A-Z])/;
    if (expresion.test(password)) {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
      console.log("true");
    } else {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border border-danger");
      console.log("false");
    }
  });
}
validarPasswordVista();

// DNI
function validarDni() {
    let password = document.querySelector('#dni').value;
    let expresion =  /^[0-9]{8,8}[A-Z]$/;
    if(expresion.test(password)){
        return true;
    } else {
        return false;
    }
}

function validarDnidVista() {
  let titulo = document.querySelector("#dni");
  let errortitulo = document.querySelector("#errorDni");
  titulo.addEventListener("keyup", function () {
    let dni = titulo.value;
    let expresion = /^[0-9]{8,8}[A-Z]$/;
    if (expresion.test(dni)) {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    } else {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border border-danger");
    }
  });
}
validarDnidVista();

// APELLIDOS
function validarApellidos() {
  let apellidos = document.querySelector("#apellidos").value;
  if (apellidos.length < 3) {
    return false;
  } else {
    return true;
  }
}
function validarApellidosVista() {
  let titulo = document.querySelector("#apellidos");
  let errortitulo = document.querySelector("#errorApe");
  titulo.addEventListener("keyup", function () {
    let apellidos = titulo.value;
    if (apellidos.length < 3) {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border  border-danger");
    } else {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    }
  });
}
validarApellidosVista();

// TELEFONO
function validarTelefono() {
  let telefono = document.querySelector("#telefono").value;
  let expresion = /^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/;
  if (expresion.test(telefono)) {
    return true;
  } else {
    return false;
  }
}
function validarTelefonoVista() {
  let titulo = document.querySelector("#telefono");
  let errortitulo = document.querySelector("#errorTel");
  titulo.addEventListener("keyup", function () {
    let telefono = titulo.value;
    let expresion = /^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/;
    if (expresion.test(telefono)) {
      errortitulo.setAttribute("class", "d-none");
      titulo.setAttribute("class", "form-control");
    } else {
      errortitulo.setAttribute("class", "error");
      titulo.setAttribute("class", "form-control border border-danger");
    }
  });
}
validarTelefonoVista();

//funcion la cual es comprobada por onsubmit que recoge las variables y devuelve true o false
function validarCampos() {
  let nombre = validarNombre();
  let email = validarEmail();
  let contraseña = validarPassword();
  let dni = validarDni();
  let apellidos = validarApellidos();
  let telefono = validarTelefono();
  
  if (
    nombre == false ||
    dni==false||
    contraseña == false ||
   email==false ||
    apellidos == false ||
    telefono == false
  ) {
    return false;
  } else {
    return true;
  }
}

//se obtiene el formulario y no se envia hasta que los campos esten correctos
let form =document.getElementById("formulario");
form.addEventListener('submit', validarFormulario);

function validarFormulario(evt){
  //paramos el submit
  evt.preventDefault();
 let dni= document.querySelector('#dni').value;
 let email= document.querySelector('#email').value;
let modo = document.querySelector('#modo').value;
 //se obtiene el dni y el email para luego ser comprobados en la bd de que no exista
 cadena="dni=" + dni + '&email='+email;
 //peticion ajax que devuelve true o false dependiendo si existe el dni y el email
 $.ajax({
     type:"POST",
     url:"/citascocina/controlador/RegistroUsuarioCompruebaDni_Email.php",
     data:cadena
 }).done(function(respuesta){

  //if para que no compare el dni ni el email a la hora de editar
  if (!modo=='editar') {
    if (respuesta==false){
      $('#errorDniEmail').attr("class", "d-none");
      if (validarCampos()) {
        $('#errorDniEmail').attr("class", "d-none");
        form.submit();
      } else {
        $('#errorDniEmail').attr("class", "form-control");
      }
        
    }else {
      $('#errorDniEmail').attr("class", "form-control");
    }
  }else{
    //if para que cuando entre en el modo editar solo valide los campos
    if (validarCampos()) {
      form.submit();
    }
    
  }

 });

}
