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
$eliminaRespuesta=$_SESSION['eliminaRespuesta'];
$conexion=crearConexion();
$elemento=new Elemento();
$usuario=new Usuario();
$idElemento=$_REQUEST['cod'];
$cuerpo=$_REQUEST['cuerpo'];
$idautor=$_REQUEST['idautor'];


$elemento=encontrarElementoPorId($idElemento,$conexion);
$usuario=obtenerUsuarioPorId($idautor,$conexion);

if(!isset($eliminarespuesta)){
	$eliminaRespuesta['elemento']=$elemento;
	$_SESSION['eliminaRespuesta']=$eliminaRespuesta;
}

cerrarConexion($conexion);
?>
<form id="eliminaRespuesta" name="Confirmar" method="post" action="eliminaRespuesta.php">
	<div id="cuadroEliminacion">
		<fieldset>
		<h2>Confirme o Rechaze La Eliminacion De La Siguiente Respuesta</h2>
		<div id="div_datoUsuario">
			<label class="autor" id="label_autor">Email Del Autor :  </label><?php echo $usuario->email;?>		
		</div>
		<div id="respuesta">
			<label class="respuesta" id="label_respuesta">Contenido De La Respuesta: </label><?php echo $elemento->cuerpo;?>
		</div>		
		<div id="botonesEliminacion">
				<input type="submit" value="Confirmar" />
				<input type="button" value="Cancelar" name ="cancelar" onClick="location.href='../preguntaRespuesta.php'" />
		</div>
		</fieldset>
	</div>	
	
</form>

<?php
	require_once ("../includes/styles/templates/pie.php");
?>