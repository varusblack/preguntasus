function camposVacios(){
	var resultado = true;
	var email = document.getElementById(email).valueOf;
	var pass = document.getElementById(pass).valueOf;
	
	if(email == null || pass==null){
		if(email == null){
			document.getElementById(erroresBuscarPregunta).innerHTML = "El campo email no puede ser vacío.";			
		}
		if(pass == null){
			document.getElementById(erroresBuscarPregunta).innerHTML = "El campo contraseña no puede ser vacío.";
		}
		resultado = false;
	}
	return resultado;
}
