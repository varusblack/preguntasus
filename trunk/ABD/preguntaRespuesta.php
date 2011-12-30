<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
include_once ("./accesosBD/conexionesBD.php");
include_once ("./accesosBD/accesosElemento.php");
require_once ("./entidades/Elemento.php");
session_start();
$user=$_SESSION['usuario'];
$conexion=crearConexion();
$elemento= new Elemento();
$elemento= encontrarElementoPorId(1,$conexion);
?>

<div class="container">
	<div id="header"></div>
	<div id="content">
		<div id="titulo">
			<h2 class="rotuloComun">Titulo:</h2>
			<h4 class="centra titulo"> 
			<?				
			print($elemento->titulo);
			?>
		</div>
		<div id="cuerpo"
			</h4>
			<h2 class="rotuloComun">Contenido:</h2>
			<h4 class="centra cuerpo"> 
			<?
			print($elemento->cuerpo);
			?>
			</h4>			
		</div>
		<div id="respuesta">
			<h2 class="rotuloComun">Numero De Respuestas Publicadas :
			<?
			print(obtenerNumeroDeRespuestasDeElemento($elemento,$conexion));
			$respuestas=array();
			$respuestas=encontrarRespuestas($elemento,$conexion);
			foreach ($respuestas as $value) {
				print("$value");
			}	
			?>
			</h2>
			
		</div>
		<form id="mi_respuesta">
			<h3 class="rotuloComun">Mi Respuesta Aportada es</h3>
			<textarea id="imput-respuesta" tabindex="101" rows="15" cols="92" name="mi-respuesta">
			</textarea>
			<div id="div_botones">
				<input id="submit" type="submit" value="Publicar Mi Respuesta" />
				<input id ="reset" type="reset" value="Limpiar Respuesta"/>
			</div>
		</form>
	</div>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>
