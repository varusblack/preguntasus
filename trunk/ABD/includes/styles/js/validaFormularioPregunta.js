/**
 * @author Alberto
 */
function validaPregunta(){
	var titulo=document.getElementById("tituloPregunta").value;
	var cuerpo =document.getElementById("cuerpoPregunta").value;
	var tag = document.getElementById("tag").value;
	return comprobar_camposDatos_vacios(titulo,cuerpo,tag);
	
}

function comprobar_camposDatos_vacios(titulo,cuerpo,tag){
	
		if(titulo==""){
			window.alert("Campo TITULO NO puede esta VACIO");
			return false;
		}
		if(cuerpo==""){
			window.alert("Campo CUERPO NO puede estar VACIO");
			return false;
		}
		if(tag==""){
			window.alert("Campo TAG NO puede estar VACIO");
			return false;
		}
		return true;
}