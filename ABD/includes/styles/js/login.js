function camposVacios(){
	resultado = true;
	var email = document.getElementById("email").value;
	var pass = document.getElementById("pass").value;

	if(email == "" || pass==""){
		if(email ==""){
                        alert("El email no puede estar en blanco");
			document.getElementById("erroresBuscarPregunta").innerHTML += "El campo email no puede ser vacío.<br>";			
		}
		if(pass == ""){
                        alert("La contraseña no puede estar en blanco");
			document.getElementById("erroresBuscarPregunta").innerHTML += "El campo contraseña no puede ser vacío.";
		}
		resultado = false;
	}
	return resultado;
}
