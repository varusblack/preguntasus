<?php
require_once ("../includes/styles/templates/cabecera.php");

if (!isset($formularioModificaRespuesta)) { 
  	$formularioModificaRespuesta['respuesta'] = ""; 
	$idElemento=$_REQUEST['cod'];
	$idPregunta=$_REQUEST['codigoPregunta'];
	$formularioModificaRespuesta['id']=$idElemento;
	$formularioModificaRespuesta['idpregunta']=$idPregunta;
  	$_SESSION['formularioRespuesta'] = $formularioModificaRespuesta;
}
if (isset($errores) && count($errores)>0) { 
  echo "<div id=\"div_errores\" class=\"error\">";
  foreach($errores as $error) {
    echo $error . "<br/>"; 
  }
  echo "</div>";
}
$elemento=new Elemento();
$usuario=new Usuario();
$conexion=crearConexion();
$elemento=encontrarElementoPorId($idElemento,$conexion);
$idautor=$elemento->idautor;
$usuario=obtenerUsuarioPorId($idautor,$conexion);
cerrarConexion($conexion);

?>
<form id="modificaRespuesta" name="Modificar" method="post" action="modificaRespuesta.php">
	<div id="cuadroModificacion">
		<h2 class="rotulos">Modifique Los Datos De La Respuesta</h2>
		<div id="div_datoUsuario">
			<label  id="label_modificaRespuesta">Email Del Autor :  </label><?php echo $usuario->email;?>		
		</div>
		<div id="div_modifica_respuesta">
			<textarea id="text_modificaRespuesta" name="respuestaModificada" tabindex="101" rows="5" cols="80" ><?php echo $elemento->cuerpo;?></textarea>
		</div>		
		<div id="div_botonModificar">
			<input id="botonModificar" type="submit" value="Modificar" name="botonModificar" />
		</div>
	</div>
</form>

<?php
	require_once ("../includes/styles/templates/pie.php");
?>