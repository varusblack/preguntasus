function validaRes(){
	var respuesta=document.getElementById("mi-respuesta").value;
	if (respuesta==""){
		window.alert("El campo Respuesta no puede estar vacio");
		return false;
	}
}

/*function controlAdministrador(valor){
	if (valor==1){
		document.getElementById("modificaRespuesta").disabled=false;
	}else{
		document.getElementById("modificaRespuesta").disabled=true;
	}
	
}*/
