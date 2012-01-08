
function comprobarCamposVacios(){
	var resultado = true;
	var palabrasClave = document.getElementById("labelBusquedaPalabras").value;
	var tags = document.getElementById("labelBusquedaTags").value;
	
	var palabraVacio = (palabrasClave == null) || (palabrasClave == "");
	var tagVacio = (tags == null) || (tags = "");
	
	if (palabraVacio && tagVacio){
		document.getElementById("erroresBuscarPregunta").innerHTML = "Ambos campos no pueden ser vacíos.";
		resultado = false;		
	}
	return resultado;
}

function buscarPorTag(tag){
	document.getElementById("tag").value=tag;
	document.forms["buscarTagIndex"].submit();
}

