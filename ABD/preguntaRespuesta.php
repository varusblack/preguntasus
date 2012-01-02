<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
require_once ("./accesosBD/conexionesBD.php");
require_once ("./accesosBD/accesosElemento.php");
require_once ("./entidades/Elemento.php");
session_start();
$user=$_SESSION['usuario'];
/*
 * Se crea una variable nuevaRespuesta y errores en la sesión actual 
 * Con el isset si es la primera vez que entramos en preguntaRespuesta.php, inicializamos la variable a vacio
 * para evita que se rellene o almacene contenido anterior 
 */

$nuevaRespuesta=$_SESSION['nuevaRespuesta'];
$errores=$_SESSION['errores'];
$conexion=crearConexion();
$elemento= new Elemento();
//$idelemento=$_REQUEST['idsolicitado'];
$idelemento=1;
$elemento= encontrarElementoPorId($idelemento,$conexion);

if(!isset($nuevaRespuesta)){
	$nuevaRespuesta['respuesta']="";
	$nuevaRespuesta['elemento']=$elemento;
	$nuevaRespuesta['idelemento']= $idelemento;
	$_SESSION['nuevaRespuesta']=$nuevaRespuesta;
}

if (!empty($errores)) { 
    echo "<div id=\"div_errores\" class=\"error\">";
    	echo $errores . "<br/>"; 
    echo "</div>";
  }
?>
<div class="container">
	<div id="header"></div>
	<div id="content">
		<div id="titulo">
			<h2 class="rotuloComun">Titulo:</h2>
			<h4 class="centra titulo"> 
			<?				
			echo($elemento->titulo);
			?>
			</h4>
		</div>
		<div id="cuerpo">
			
			<h2 class="rotuloComun">Contenido:</h2>
			<h4 class="centra cuerpo"> 
			<?
			print($elemento->cuerpo);
			?>
			</h4>			
		</div>
		<div id="respuesta">
			<h2 class="rotuloComun"> Numero De Respuestas Publicadas :
				<?print(obtenerNumeroDeRespuestasDeElemento($elemento,$conexion));?>
			</h2>
			<h4>
			 <?			
			$respuestas=array();
			$respuestas=encontrarRespuestas($elemento,$conexion);					
			$elementoRespuesta=new Elemento();
		    foreach ($respuestas as $res){
				echo "Respuesta Numero: ".$i."   ".$res->cuerpo. "<BR/>";
			}			
			?>
			</h4>			
		</div>
		<?
		cerrarConexion($conexion);
		?>
		<form id="mi_respuesta" action="./procesado/procesaNuevaRespuesta.php" method="get">
			<h2 class="rotuloComun">Nueva Respuesta Aportada</h2>
			<textarea id="imput-respuesta" tabindex="101" rows="15" cols="92" name="mi-respuesta">
			</textarea>
			<div id="div_botones">
				<input id="submit" name ="submit" type="submit" value="Publicar Mi Respuesta" />
				<input id ="reset" name="reset" type="reset" value="Limpiar Respuesta"/>
				<input id ="submit" name="cancelar" type="submit" value="Cancelar"/>
			</div>
		</form>
	</div>
</div>

<?php
require_once ("./includes/styles/templates/pie.php");
?>
