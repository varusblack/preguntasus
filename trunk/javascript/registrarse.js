function comprobarEmail(email) {
	var patronEmail = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	if(email == '' || email == null || email.match(patronEmail)) {
		return false;
	} else {
		return true;
	}
}

function coincidenPasswords() {
	var pass1 = document.getElementById(pass1).value;
	var pass2 = document.getElementById(pass2).value;
	if(!pass1.match(pass2)) {
		return false;
	} else {
		return true;
	}
}

function comprobarNoVacio(cadena) {
	if(cadena == null || cadena == '') {
		return false;
	}
}

function comprobarFechaNacimiento() {
	var fech = document.getElementById(fechaNacimiento).value;
	var patronFecha = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
	if(fech == null || fech == '' || !fech.match(patronFecha)) {
		return false;
	} else {
		return true;
	}
}