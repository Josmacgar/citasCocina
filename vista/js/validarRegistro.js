
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

function validarFormulario() {
    let nombre = validarNombre();
    let email= validarEmail();
    let contraseña=validarPassword();

    if(nombre==false||email==false||contraseña==false){
        return false;
    }else{
        return true;
    }
}
// validarFormulario();

// export {validarEmail, validarPassword};