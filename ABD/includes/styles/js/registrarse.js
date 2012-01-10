function comprobarEmail(email) {
	var patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return patronEmail.test(email);
}




function comprobarRegistrarse(){
    resultado=true;
    dondeEstamos=document.getElementById("submit").value;
    
    if(resultado && document.getElementById("emailUsuario").value=='' ){
        alert("No se puede dejar en blanco el correo electronico");
        resultado=false;
        document.getElementById("emailUsuario").focus();
    }
    if(resultado && !comprobarEmail(document.getElementById("emailUsuario").value) ){
        alert("El email introducido no es válido");
        resultado=false;
        document.getElementById("emailUsuario").focus();
    }
    if(resultado && document.getElementById("pass1").value=='' && dondeEstamos!="Editar perfil"){
        alert("La contraseña no puede estar en blaco");
        resultado=false;
        document.getElementById("pass1");
    }
    if(resultado && document.getElementById("pass2").value==''&& dondeEstamos!="Editar perfil"){
        alert("La verificación de la contraseña no puede estar en blanco");
        resultado=false;
        document.getElementById("pass2");
    }
    if(resultado && document.getElementById("pass2").value!=document.getElementById("pass1").value && dondeEstamos!="Editar perfil"){
        alert("La contraseña y su verificación no son iguales");
        resultado=false;
        document.getElementById("pass1");
    }
    if(resultado && document.getElementById("nombre").value==''){
        alert("El nombre no puede estar en blanco");
        resultado=false;
        document.getElementById("nombre");
    }
    if(resultado && document.getElementById("apellidos").value==''){
        alert("Los apellidos no pueden estar en blanco");
        resultado=false;
        document.getElementById("apellidos");
    }
    if(resultado && document.getElementById("fechaNacimiento").value==''){
        alert("La fecha de nacimiento no puede estar en blanco");
        resultado=false;
        document.getElementById("fechaNacimiento");
    }
  /*   if(resultado && validafecha(document.getElementById("fechaNacimiento").value)){
        alert("La fecha de nacimiento no puede estar en blanco");
        resultado=false;
        document.getElementById("fechaNacimiento");
    }*/
    
    return resultado;
}

 