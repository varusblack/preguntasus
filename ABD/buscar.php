<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
require_once ("./accesosBD/conexionesBD.php");
require_once ("./accesosBD/accesosElemento.php");
require_once ("./accesosBD/accesosTag.php");
require_once ("./accesosBD/accesosUsuario.php");
require_once ("./accesosBD/accesosVisita.php");
require_once ("./accesosBD/accesosVotacion.php");
require_once ("./entidades/Tag.php");
require_once ("./entidades/Elemento.php");
require_once ("./entidades/Usuario.php" );

	session_start();
	$buscarPreguntas=$_SESSION["buscarPreguntas"];
	$erroresBuscarPreguntas=$_SESSION["erroresBuscarPregunta"];

	$_SESSION["buscarPreguntas"]=$buscarPreguntas;
	
?>
<div id="contenedor_cuerpo">
	<div id="erroresBuscarPregunta" class="errores">
	<?php
		if (isset($erroresBuscarPreguntas)) {
			foreach ($erroresBuscarPreguntas as $error) {
				print("<div class='error'>");
				print("$error");
				print("</div>");
			}
		}
	?>
	</div>
	
	<form id="buscarPreguntas" name="buscarPreguntas" action="./procesado/buscarPreguntas.php">
				
		<div id="cuadroBusqueda">
			<div id="labelsBusqueda">
				<div class="labelBusqueda">
					<label for="palabras">Palabras clave:</label>
				</div>
				<div class="labelBusqueda separado">
					<label for="tag">Tag:</label>
				</div>
			</div>
			<div id="inputsBusqueda">
				<div class="inputBusqueda">
					<input id="palabras" type="text"/>
				</div>				
				<div class="inputBusqueda separado">
					<select id="tag">
						<option></option>
						<?php
							$conexion = crearConexion();
							$arrayTags = obtenerTodosLosTags($conexion);
 							cerrarConexion($conexion);
							foreach($arrayTags as $tag){
								echo "<option value='$tag->id'>".$tag->tag."</option><br>";
							}					
						?>
					</select>
				</div>
			</div>
			<div id="botonBuscar">
				<input type="submit" value="Buscar" />
			</div>
		
		</div>		
		<div id="preguntas">
			
		</div>
	</form>
		<div id="resultados">
			<?php 			
				/**
				 * Tipos de búsqueda:
				 * 	1.- Por palabra y tag
				 * 	2.- Solo por palabras
				 * 	3.- Solo por tag
				 */
				$tipoBusqueda = $_SESSION["tipobusqueda"];
				if(isset($tipoBusqueda)){
				
					$conexion = crearConexion();
					
					if($tipoBusqueda==1){
						$cadena = $buscarPreguntas["palabras"]; 
						$tag = $buscarPreguntas["tag"]; 
						$arrayElementos = encontrarElementosPorPalabrasYTag($cadena, $tag, $conexion);
					}else{
						if($tipoBusqueda==2){
							$cadena = $buscarPreguntas["palabras"]; 
							$arrayElementos = encontrarElementosPorPalabras($cadena, $conexion);
						}else{
							$tag = $buscarPreguntas["tag"];
							$arrayElementos = encontrarElementosPorTag($tag, $conexion);
						}
					}								
					
					foreach($arrayElementos as $elemento){
						$idUsuario = $elemento->idautor;
						$usuario = obtenerUsuarioPorId($idUsuario, $conexion);
						$numeroDeVotos = obtenerNumeroDeVotosDeElemento($elemento, $conexion);
						$numeroDeRespuestas = obtenerNumeroDeRespuestasDeElemento($elemento, $conexion);
						$numeroDeVisitas = obtenerNumeroDeVisitasDeElemento($elemento, $conexion);
						$tag1 = NULL;
						$tag2 = NULL;
						$tag3 = NULL;
						
						$resTags = obtenerTagsDeElemento($elemento, $conexion);		
						$contador = 1;			
						foreach($resTags as $tg){
							if($contador==1){
								$tag1 = $tg;
								$contador = $contador+1;
							}
							if($contador==2){
								$tag2 = $tg;
								$contador = $contador+1;
							}
							if($contador==3){
								$tag3 = $tg;
								$contador = $contador+1;
							}
							if($contador>3){
								break;
							}
						}
						
						require("./includes/widgets/preguntas.php");
					}				
					cerrarConexion($conexion);
					$_SESSION["tipobusqueda"]=NULL;
				}
			?>
		</div>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>
