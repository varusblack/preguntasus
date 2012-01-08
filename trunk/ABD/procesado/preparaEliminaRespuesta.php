<?php

require_once ("../includes/styles/templates/cabecera.php");
require_once ("../includes/widgets/login.php");
require_once ("../includes/widgets/barranavegacion.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
require_once ("../accesosBD/accesosUsuario.php");
require_once ("../entidades/Elemento.php");
require_once ("../entidades/Usuario.php");

session_start();
$idElemento=$_REQUEST['cod'];
//$eliminaRespuesta=$_SESSION['eliminaRespuesta'];

$conexion=crearConexion();
$elemento=new Elemento();
$usuario=new Usuario();


$elemento=encontrarElementoPorId($idElemento,$conexion);
$idautor=$elemento->idautor;
$usuario=obtenerUsuarioPorId($idautor,$conexion);

/*if(!isset($eliminarespuesta)){
	$eliminaRespuesta['elemento']=$elemento;
	$_SESSION['eliminaRespuesta']=$eliminaRespuesta;
	$_SESSION['codigoPregunta']= $_REQUEST['codigoPregunta'];
	
}*/

cerrarConexion($conexion);
?>
<form id="eliminaRespuesta" name="Confirmar" method="post" action="eliminaRespuesta.php">
	<div id="cuadroeliminacion">
		<h2 class="rotulos">Confirme La Eliminacion De La Respuesta Seleccionada</h2>
		<div id="div_datoUsuario">
			<label class="autor" id="label_eliminaRespuesta">Email Del Autor :  </label><?php echo $usuario->email;?>		
		</div>
		<div id="div_respuesta">
			<label class="respuesta" id="label_eliminaRespuesta">Contenido De La Respuesta: </label><?php echo $elemento->cuerpo;?>
		</div>		
		<div id="div_botonConfirmar">
			<input type="submit" value="Confirmar" />
		</div>
	</div>	
</form>

<?php
	require_once ("../includes/styles/templates/pie.php");
?>