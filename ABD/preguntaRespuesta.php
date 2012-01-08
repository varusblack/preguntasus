<?php
require_once ("./includes/styles/templates/cabecera.php");
session_start();
/*
 * 
 * Se crea una variable nuevaRespuesta y errores en la sesión actual 
 * Con el isset si es la primera vez que entramos en preguntaRespuesta.php, inicializamos la variable a vacio
 * para evita que se rellene o almacene contenido anterior 
 */

$nuevaRespuesta=$_SESSION['nuevaRespuesta'];

$accedeUsuario=unserialize($_SESSION['usuario']);
$errores=$_SESSION['errores'];
$tipoUsuario=$accedeUsuario->tipousuario; 
$conexion=crearConexion();
$elemento= new Elemento();
$idelemento=$_REQUEST['idsolicitado']; // Para cuando se pulse la pregunta en index.php 

$elemento= encontrarElementoPorId($idelemento,$conexion);

if ($tipoUsuario!=""){// solo se actualizará las visitas de usuarios logueados
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
		<div id="nombreCampos">
			<h3 class="rotuloRespuestas">Titulo:</h3>
			<h3 class="rotuloRespuestas">Contenido:</h3>
			<h3 class="rotuloRespuestas"> Numero De Respuestas Publicadas :<?print(obtenerNumeroDeRespuestasDeElemento($elemento,$conexion));?></h3>
		</div>
		<div id="contenidoCampos">				
			<h5 class="contenidoRespuesta"> <?print($elemento->cuerpo);?></h5>
			<h5 class="contenidoRespuesta"> <?echo($elemento->titulo);?></h5>		
		</div>
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
				<?if ($tipoUsuario!=""){?>
					<th>Modifica</th>
					<th>Elimina</th>
			  <?}?>
					<th>Contenido De La Respuesta</th>
				</tr>
			<?
			foreach ($respuestas as $res){
				?>
				<tr align="left" >
				<?
				if ($tipoUsuario==1){ //Si es administrador				
					?>
					<td>
						<a href="./procesado/preparaModificaRespuesta.php?cod=<?echo $res->id?>"><img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>						
					</td>						 	
					<td>
						<a href="./procesado/preparaEliminaRespuesta.php?cod=<?echo $res->id?>&codigoPregunta=<?echo $idelemento?>"><img  src="./includes/styles/imagenes/iconos/eliminar.png" /></a>						
					</td>
					<?
				}
				?>
				<td><?echo "R.N. ".$cont." :  ".$res->cuerpo;?></td> 
				<?
				$cont++;
				?>
				</tr>
				<?
			}
			
			?>						
			</h5>
			</table>			
		</div>
		<?
		cerrarConexion($conexion);
		if (isset($accedeUsuario)){
			?>
				
			<?
}
if (($tipoUsuario!="")){
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