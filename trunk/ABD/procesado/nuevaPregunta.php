<?php
session_start();

$formulario = $_SESSION["formularioPregunta"];

if (isset($formulario)) {// si el formulario contiene datos
  $formulario["titulo"] = $_REQUEST["titulo"];  
  $formulario["tag"] = $_REQUEST["tag"];
  $formulario["cuerpo"] = $_REQUEST["cuerpo"];
  $_SESSION["formularioPregunta"] = $formulario;
  
} else 
		Header("Location:preparaPreguntar.php");
  		$errores = validar($formulario);
if (count($errores) > 0) {
   		$_SESSION["errores"] = $errores;
   		Header("Location:preparaPreguntar.php");
} else{
   		Header("Location:creaPregunta.php");
  }
function validar($formulario) {  
  if (!(isset($formulario['titulo']) && strlen($formulario['titulo'])>0))  // Modo resumido: if (empty($formulario['nombre']))
    $errores[] = 'El campo <b>Titulo</b> no puede ser vacio';
  
  if (!(isset($formulario['tag']) && strlen($formulario['tag'])>0))
    $errores[] = 'El campo <b>Tag</b> no puede ser vacio';
    
  if (!(isset($formulario['cuerpo']) && strlen($formulario['cuerpo'])>0))
    $errores[] = 'El campo <b>Pregunta</b> no puede ser vacio';
  
  	return $errores;    
  }
?>