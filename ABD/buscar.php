<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/cabecera.php");

	$erroresBuscarPreguntas = @$_SESSION["erroresBuscarPregunta"];
	$haBuscado = FALSE;
	if (isset($_GET["haBuscado"])) {
		$haBuscado = $_GET["haBuscado"];
	} else {
		$haBuscado = $_SESSION["haBuscado"];
	}
	$tag = NULL;
	$cadena = NULL;
	$tag = @$_SESSION["tag"];
	$cadena = @$_SESSION["palabras"];
?>
<div id="contenedor_cuerpo">
	<div id="erroresBuscarPregunta" class="errores">
	<?php
		if (isset($erroresBuscarPreguntas) && $haBuscado === TRUE) {
			foreach ($erroresBuscarPreguntas as $error) {
				print("<div class='error'>");
				print("$error");
				print("</div>");
			}
			unset($_SESSION["erroresBuscarPregunta"]);
		}
	?>
	</div>
	
	<form id="buscarPreguntas" name="buscarPreguntas" action="./procesado/buscarPreguntas.php" method="post" onsubmit="return comprobarCamposVacios()">
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
					<input id="palabras" name="palabras" type="text"/>
				</div>				
				<div class="inputBusqueda separado">
					<select id="tag" name="tag">
						<option></option>
						<?php
							$conexion = crearConexion();
							$arrayTags = obtenerTodosLosTags($conexion);
 							cerrarConexion($conexion);
							foreach($arrayTags as $tg){
								echo "<option value='$tg->id'>".$tg->tag."</option><br>";
							}					
						?>
					</select>
				</div>
			</div>
			<div id="botonBuscar">
				<input type="submit" name="buscar" value="Buscar" />
			</div>
		</div>		
	</form>
	<div id="preguntas">
		<?php 			
			/**
			 * Tipos de búsqueda:
			 * 	1.- Por palabra y tag
			 * 	2.- Solo por palabras
			 * 	3.- Solo por tag
			 */
			$tipoBusqueda = @$_SESSION["tipobusqueda"];
			if (isset($tipoBusqueda)) {
			
				$conexion = crearConexion();
				$arrayElementos = array();
				if ($tipoBusqueda === 1) {
					if (isset($tag)) {
						$as = obtenerTagPorId($tag, $conexion);
						$arrayElementos = encontrarElementosPorPalabrasYTag($cadena, $as, $conexion);
					}
				} else {
					if ($tipoBusqueda === 2) {
						$arrayElementos = encontrarElementosPorPalabras($cadena, $conexion);	
					} else {
						if (isset($tag)) {
							$as = obtenerTagPorId($tag, $conexion);
							$arrayElementos = encontrarElementosPorTag($as, $conexion);
						}							
					}
				}								
				if (count($arrayElementos) == 0) {
					echo "No se han encontrado resultados.";
				} else {
											
					foreach ($arrayElementos as $elemento) {
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
						foreach ($resTags as $tg) {
							if ($contador == 1) {
								$tag1 = $tg;
								$contador = $contador+1;
							}
							if ($contador == 2) {
								$tag2 = $tg;
								$contador = $contador+1;
							}
							if ($contador == 3) {
								$tag3 = $tg;
								$contador = $contador+1;
							}
							if ($contador > 3) {
								break;
							}
						}						
						require($_SERVER["DOCUMENT_ROOT"]."/abd/includes/widgets/preguntas.php");
					}				
					cerrarConexion($conexion);
					$_SESSION["tipobusqueda"] = NULL;
				}
			}
		?>
	</div>
</div>
<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/pie.php");
?>
