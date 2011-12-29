<?php
require_once ("../../accesosBD/conexionesBD.php");
require_once ("../../accesosBD/accesosTag.php");
require_once ("../../accesosBD/accesosUsuario.php");

function imprimirPreguntas($arrayDeElementos){
	$conexion = crearConexion();
	
	foreach($arrayDeElementos as $elemento){
		$id=$elemento->__get("id");
		$idautor=$elemento->__get("idautor");
		$titulo=$elemento->__get("titulo");
		$cuerpo=$elemento->__get("cuerpo");
		$idrespuesta=$elemento->__get("idrespuesta");
		$fechapregunta=$elemento->__get("fechapregunta");
		
		$usuario = obtenerUsuarioPorId($idautor, $conexion);
		
		foreach ($usuario as $user ) {
			$nombreUsuario = $user->__get("email");
		}
		
		echo construirDivElemento($nombreUsuario, $titulo);
	}
	
	cerrarConexion($conexion);
}




function construirDivElemento($nombreUsuario,$tituloPregunta){
	$cadena = '<div class="pregunta"><div class="usuario_que_pregunta">'.$nombreUsuario.
	'</div><div class="preguntaConcreta"><div class="tituloPregunta">'.$tituloPregunta.
	'</div><div class="estadisticasPregunta"></div></div></div>';
	
	return $cadena;
}


?>
<div class="pregunta">
	Pregunta
	<div class="usuario_que_pregunta">
		Usuario preguntador
	</div>
	<div class="preguntaConcreta">
		Contenedor pregunta concreta
		<div class="tituloPregunta">
			Titulo de la pregunta
		</div>
		<div class="estadisticasPregunta">
			Estadisticas de la pregunta
		</div>
	</div>
</div>