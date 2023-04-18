
function validarNombre() {
    let datos=true;
    document.querySelector('#nombre').addEventListener("keyup",function () {
        let nombre = document.querySelector('#nombre').value;
        if(nombre.length<3){
            document.querySelector('#errorNombre').setAttribute("class","error");
            document.querySelector('#nombre').setAttribute("class","form-control border  border-danger");
            datos= false;
        }else{
            document.querySelector('#errorNombre').setAttribute("class","d-none");
            document.querySelector('#nombre').setAttribute("class","form-control");
            datos= true;
        }
    });
    return datos;
}
validarNombre();

 function validarEmail(){
    let datos=true;
    document.querySelector('#email').addEventListener("keyup",function () {
        let email=document.getElementById('email').value;
        let expresion =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        if( expresion.test(email) ){
            document.querySelector('#errorEmail').setAttribute("class","d-none");
            document.querySelector('#email').setAttribute("class","form-control");
            datos= true;
        }else{
            document.querySelector('#errorEmail').setAttribute("class","error");
            document.querySelector('#email').setAttribute("class","form-control border  border-danger");
            datos= false;
        }
    });
    return datos;
}
validarEmail();

 function validarPassword() {
    let datos=true;
    document.querySelector('#password').addEventListener("keyup",function () {
        let password = document.querySelector('#password').value;
        let expresion = /(?=.*[a-z])(?=.*[A-Z])/;
        if( expresion.test(password) ){
            document.querySelector('#errorContraseña').setAttribute("class","d-none");
            document.querySelector('#password').setAttribute("class","form-control");
            datos= true;
        }else{
            document.querySelector('#errorContraseña').setAttribute("class","error");
            document.querySelector('#password').setAttribute("class","form-control border  border-danger");
            datos= false;
        }
    });
    return datos;
}
validarPassword();
function validarDni(){
    let datos=true;
    document.querySelector('#dni').addEventListener("keyup",function () {
        let dni=document.getElementById('dni').value;
        // /^[0-9]{8,8}[A-Za-z]$/ --este regez permite tambien la letra en minuscula
        let expresion =  /^[0-9]{8,8}[A-Z]$/;
        if( expresion.test(dni) ){
            document.querySelector('#errorDni').setAttribute("class","d-none");
            document.querySelector('#dni').setAttribute("class","form-control");
            datos= true;
        }else{
            document.querySelector('#errorDni').setAttribute("class","error");
            document.querySelector('#dni').setAttribute("class","form-control border  border-danger");
            datos= false;
        }
    });
    return datos;
}
validarDni();
function validarApellidos(){
    let datos=true;
    document.querySelector('#apellidos').addEventListener("keyup",function () {
        let ape=document.getElementById('apellidos').value;
        let expresion =  /[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]+$/;
        if( expresion.test(ape) ){
            document.querySelector('#errorApe').setAttribute("class","d-none");
            document.querySelector('#apellidos').setAttribute("class","form-control");
            datos= true;
        }else{
            document.querySelector('#errorApe').setAttribute("class","error");
            document.querySelector('#apellidos').setAttribute("class","form-control border  border-danger");
            datos= false;
        }
    });
    return datos;
}
validarApellidos();
function validarTelefono(){
    let datos=true;
    document.querySelector('#telefono').addEventListener("keyup",function () {
        let tel=document.getElementById('telefono').value;
        let expresion =  /^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/;
        if( expresion.test(tel) ){
            document.querySelector('#errorTel').setAttribute("class","d-none");
            document.querySelector('#telefono').setAttribute("class","form-control");
            datos= true;
        }else{
            document.querySelector('#errorTel').setAttribute("class","error");
            document.querySelector('#telefono').setAttribute("class","form-control border  border-danger");
            datos= false;
        }
    });
    return datos;
}
validarTelefono();

function validarFormulario() {
    let nombre = validarNombre();
    let email= validarEmail();
    let contraseña=validarPassword();
    let dni=validarDni();
    let apellidos=validarApellidos();
    let telefono=validarTelefono();

    if(nombre==false||email==false||contraseña==false||dni==false||apellidos==false||telefono==false){
        return false;
    }else{
        return true;
    }
}
// validarFormulario();

// export {validarEmail, validarPassword};