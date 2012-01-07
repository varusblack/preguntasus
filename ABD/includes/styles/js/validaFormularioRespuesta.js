function validaRes(){
	var respuesta=document.getElementById("mi-respuesta").value;
	if (respuesta==""){
		window.alert("El campo Respuesta no puede estar vacio");
		return false;
	}
}
