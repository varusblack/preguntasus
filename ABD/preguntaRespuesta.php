<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="./includes/styles/js/validaFormularioRespuesta.js"></script>
</head>
<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
require_once ("./accesosBD/conexionesBD.php");
require_once ("./accesosBD/accesosElemento.php");
require_once ("./entidades/Elemento.php");
session_start();
/*
 * 
 * Se crea una variable nuevaRespuesta y errores en la sesión actual 
 * Con el isset si es la primera vez que entramos en preguntaRespuesta.php, inicializamos la variable a vacio
 * para evita que se rellene o almacene contenido anterior 
 */

$nuevaRespuesta=$_SESSION['nuevaRespuesta'];
//$usuario=$_SESSION['tipoUsuario'];
$usuario=1;
$errores=$_SESSION['errores'];
$conexion=crearConexion();
$elemento= new Elemento();
//$idelemento=$_REQUEST['idsolicitado']; // Para cuando se pulse la respuesta en index.php
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

<body>
<div class="container">
	<div id="header"></div>
	<div id="content">
		<div id="titulo">
			<h3 class="rotuloComun">Titulo:</h3>
			<h5 class="centra titulo"> 
			<?				
			echo($elemento->titulo);
			?>
			</h5>
		</div>
		<div id="cuerpo">			
			<h3 class="rotuloComun">Contenido:</h3>
			<h5 class="centra cuerpo"> 
			<?
			print($elemento->cuerpo);
			?>
			</h5>			
		</div>
		<div id="respuesta">
			<h3 class="rotuloComun"> Numero De Respuestas Publicadas :
				<?print(obtenerNumeroDeRespuestasDeElemento($elemento,$conexion));?>
			</h3>
			<h5>
			 <?			
			$respuestas=array();
			$respuestas=encontrarRespuestas($elemento,$conexion);					
			$elementoRespuesta=new Elemento();
			$cont=1;
			foreach ($respuestas as $res){
				if ($usuario==1){ //Si es administrador				
					?>						 	
					<a href="./procesado/modificaRespuesta.php?cuerpo=<?echo$res->cuerpo;?>&cod=<?echo $res->id?>"><img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>
					<a href="./procesado/preparaEliminaRespuesta.php?cuerpo=<?echo $res->cuerpo?>&cod=<?echo $res->id?>&idautor=<?echo $res->idautor?>"><img  src="./includes/styles/imagenes/iconos/eliminar.png" /></a>
					<?
				}
				echo "R.N. ".$cont." :  ".$res->cuerpo. "<BR/>";
				$cont++;
			}?>						
			</h5>			
		</div>
		<?
		cerrarConexion($conexion);
		?>
		<div id=div_form>
		<form id="mi_respuesta" action="./procesado/procesaNuevaRespuesta.php" method="post" onsubmit="return validaRes()">
			<h3 class="rotuloComun">Nueva Respuesta Aportada</h3>
			<textarea name="mi-respuesta" id="mi-respuesta" tabindex="101" rows="5" cols="92" >
			</textarea>
			<div id="div_botones">
				<button id="submit" type="submit" >Publicar Mi Respuesta</button>
				<button id="reset" type="reset">Limpiar Respuesta</button>
				<button id="cancelar" type="button" onClick="location.href='./index.php'" />Cancelar</button>
				
			</div>
		</form>
		</div>
	</div>
</div>
</body>
<?php
	require_once ("./includes/styles/templates/pie.php");
?>