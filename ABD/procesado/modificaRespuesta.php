<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Elemento.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosElemento.php");
	
	session_start();
	$formulario = $_SESSION["formularioRespuesta"];
	
	// Si el formulario contiene datos se continuará el proceso de modificación de respuesta, en
	// caso contrario se interrumpirá
	if (isset($formulario)) {
	  $formulario["respuestaModificada"] = $_REQUEST["respuestaModificada"];
	  $_SESSION["formularioRespuesta"] = $formulario;
	  $idpregunta=$formulario["idpregunta"];
	} else
		Header("Location:preparaModificaRespuesta.php");
		$errores = validar($formulario);
	if (count($errores) > 0) {	
	   	$_SESSION["errores"] = $errores;
	   	Header("Location:/abd/procesado/preparaModificaRespuesta.php?idsolicitado=".$idpregunta);
	} else{
		modificaRespuesta($formulario);
		Header("Location:/abd/preguntaRespuesta.php?idsolicitado=".$idpregunta);
		exit();
	}
	
	function modificaRespuesta($formulario){
		$conexion=crearConexion();	
		$elemento = new Elemento();	
		$elemento=encontrarElementoPorId($formulario["id"],$conexion);
		echo "RRRRRRRRRRRRRRRRRRR";
		$elemento->cuerpo=$formulario["respuestaModificada"];
		modificarElemento($elemento,$conexion);
	   	cerrarConexion($conexion);
	}
	function validar($formulario) {
	  if (!(isset($formulario['respuestaModificada']) && strlen($formulario['respuestaModificada'])>0))  // Modo resumido: if (empty($formulario['nombre']))
	   $errores = 'El campo <b>Respuesta no Puede Estar Vacio</b> no puede ser vacío';
	   return $errores;    
	}
?>