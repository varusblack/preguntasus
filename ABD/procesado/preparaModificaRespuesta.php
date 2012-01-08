<?php
require_once ("../includes/styles/templates/cabecera.php");
/*require_once ("../includes/widgets/login.php");
require_once ("../includes/widgets/barranavegacion.php");
require_once ("../accesosBD/conexionesBD.php");
require_once ("../accesosBD/accesosElemento.php");
require_once ("../accesosBD/accesosUsuario.php");
require_once ("../entidades/Elemento.php");
require_once ("../entidades/Usuario.php");*/

session_start();
$idElemento=$_REQUEST['cod'];
$conexion=crearConexion();
$elemento=new Elemento();
$usuario=new Usuario();
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
			<textarea id="text_modificaRespuesta" name="mi-respuesta" tabindex="101" rows="5" cols="80" ><?php echo $elemento->cuerpo;?></textarea>
		</div>		
		<div id="div_botonConfirmar">
			<input type="submit" value="Modificar" name="botonModificar"/>
		</div>
	</div>	
</form>

<?php
	require_once ("../includes/styles/templates/pie.php");
?>
?>