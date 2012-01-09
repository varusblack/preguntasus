<?php
require_once ("./includes/styles/templates/cabecera.php");
//session_start();
/*
 * 
 * Se crea una variable nuevaRespuesta y errores en la sesión actual 
 * Con el isset si es la primera vez que entramos en preguntaRespuesta.php, inicializamos la variable a vacio
 * para evita que se rellene o almacene contenido anterior 
 */

//$nuevaRespuesta=$_SESSION['nuevaRespuesta'];
//$errores=$_SESSION['errores'];
$conexion=crearConexion();
$elemento= new Elemento();
$idelemento=$_REQUEST['idsolicitado']; // Para cuando se pulse la pregunta en index.php 
$elemento= encontrarElementoPorId($idelemento,$conexion);
if (isset($_SESSION['usuario'])){
	$accedeUsuario=unserialize($_SESSION['usuario']);
	$tipoUsuario=$accedeUsuario->tipousuario;
	insertarVisita($elemento,$accedeUsuario,$conexion);
} 
if(!isset($nuevaRespuesta)){
	$nuevaRespuesta['respuesta']="";
	$nuevaRespuesta['elemento']=$elemento;
	$nuevaRespuesta['idelemento']= $idelemento;
}

if (!empty($errores)) { 
    echo "<div id=\"div_errores\" class=\"error\">";
    	echo $errores . "<br/>"; 
    echo "</div>";
  }
?>

<body>
<div class="container">
	<div id="content">
		<fieldset id="recuadroPregunta" >
		<div id="div_titulo">
			<label id="label_titulo" for="titulo">Titulo:</label>
			<label id="contenidoTitulo" for="titulo"><?echo($elemento->titulo);?></label>
		</div>
		<div id="div_cuerpo">
			<label id="label_cuerpo" for="cuerpo">Contenido:</label>
			<label id="contenidoCuerpo" for="cuerpo"><?echo($elemento->cuerpo);?></label>
		</div>
		<div id="div_numerorespuestas">				
			<label id="label_numeror" for="numerorespuestas">Numero de Respuestas Publicadas:</label>
			<label id="contenidoNumeroRespuesta" for="numero"><?echo(obtenerNumeroDeRespuestasDeElemento($elemento,$conexion));?></label>
		</div>
		</fieldset>
		<div id="respuesta">	
			<h5>
			 <?			
			$respuestas=array();
			$respuestas=encontrarRespuestas($elemento,$conexion);					
			$elementoRespuesta=new Elemento();
			$cont=1;
			?>
			<table>
				<tr align="left" >
				<?if (isset($_SESSION['usuario'])){// Si existe el usuario logado
					if($tipoUsuario==1){ //Si es administrador	
				?>
					<th>Modifica</th>
					<th>Elimina</th>
			  <?}
			  }?>
					<th>Contenido De La Respuesta</th>
				</tr>
			<?
			foreach ($respuestas as $res){
				?>
				<tr align="left" >
				<?
				if (isset($_SESSION['usuario'])){// Si existe el usuario logado
					if($tipoUsuario==1){ //Si es administrador				
					?>
					<td>
						<a href="./procesado/preparaModificaRespuesta.php?cod=<?echo $res->id?>&codigoPregunta=<?echo $idelemento?>"><img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>						
					</td>						 	
					<td>
						<a href="./procesado/preparaEliminaRespuesta.php?cod=<?echo $res->id?>&codigoPregunta=<?echo $idelemento?>"><img  src="./includes/styles/imagenes/iconos/eliminar.png" /></a>						
					</td>
					<?
					}
				}
				?>
				<td><?echo "R.N. ".$cont." :  ".$res->cuerpo;?></td> 
				<?
				$cont++;
				?>
				</tr>
				<?}?>						
			</h5>
			</table>			
		</div>
		<?
		cerrarConexion($conexion);
		if (isset($accedeUsuario)){
			?>
				
			<?
}

if (isset($_SESSION['usuario'])){// Si existe el usuario logado
?>
		<div id=div_formularioRespuesta>
		<form  id="mi_respuesta" action="./procesado/procesaNuevaRespuesta.php" method="post" onsubmit="return validaRes()">
			<h3 class="rotulo">Nueva Respuesta Aportada</h3>
			<textarea name="mi-respuesta" id="mi-respuesta" tabindex="101" rows="5" cols="92" ></textarea>
			<input type="hidden" name ="idelemento" value="<?echo $idelemento?>" />
			<div id="div_botones">
				<button  id="submit" type="submit" >Publicar Mi Respuesta</button>
				<button id="reset" type="reset">Limpiar Respuesta</button>
				<button id="cancelar" type="button" onClick="location.href='./index.php'" />Cancelar</button>
				
			</div>
		</form>
		</div>
<?}?>
	</div>
</div>
</body>

<?
	require_once ("./includes/styles/templates/pie.php");
?>