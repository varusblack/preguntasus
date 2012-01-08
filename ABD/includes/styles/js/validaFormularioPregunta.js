/**
 * @author Alberto
 */
function validaPregunta(){
	window.alert("HOLAAAa");
	var titulo=document.getElementById("titulo").value;
	var cuerpo =document.getElementById("cuerpo").value;
	var tag = document.getElementById("tag").value;
	comprobar_camposDatos_vacios(titulo,cuerpo,tag);
	
}

function comprobar_camposDatos_vacios(titulo,cuerpo,tag){
	
		if(titulo==""){
			window.alert("Campo TITULO NO puede esta VACIO");
			return false;
		}
		if(cuerpo==""){
			window.alert("Campo CUERPO NO puede estar VACIO");
		}
		if(tag==""){
			window.alert("Campo TAG NO puede estar VACIO");
		}
			
}