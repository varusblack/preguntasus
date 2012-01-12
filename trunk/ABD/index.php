<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/cabecera.php");
?> 
<div id="contenedor_cuerpo">
	<div id="preguntas">
		<?php 		
			$conexion = crearConexion();
			$arrayElementos = encontrarElementosOrdenadosPorFechaDecreciente($conexion);
			
			foreach ($arrayElementos as $elemento) {
				$idUsuario = $elemento->idautor;				
				$idpregunta = $elemento->id;
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
					}
					if ($contador == 2) {
						$tag2 = $tg;
					}
					if ($contador == 3) {
						$tag3 = $tg;
					}
					if ($contador > 3) {
						break;
					}
                $contador++;
				}						
				require($_SERVER["DOCUMENT_ROOT"]."/abd/includes/widgets/preguntas.php");
			}				
			cerrarConexion($conexion);		
		?>		
	</div>
	<div id="columna">
	<form id="buscarPalabrasIndex" method="post" action="./procesado/buscarPreguntas.php">
            <fieldset>
		<div id="cuadro_busqueda">
			<div id="textoBuscarIndex">
				<label for="buscarIndex">Buscar:</label>
				<input type="text" id="palabrasIndex" name="palabras"/>				
			</div>
			<div id="botonSubmitIndex">
				<input id="botonBuscarIndex" type="submit" name="buscar" value="Buscar"/>
			</div>
		</div>
            </fieldset>
	</form>
	
	<form id="buscarTagIndex" method="post" action="./procesado/buscarPreguntas.php">
            <fieldset>
		<input type="hidden" id="tag" value="" name="tag" />
		<input type="hidden" id="buscar" value="buscar" name="buscar" />
		<div id="etiquetas_mas_frecuentes">
			<?php 
			$conexion = crearConexion();
			$tags = obtenerTodosLosTags($conexion);
			cerrarConexion($conexion);		
			foreach($tags as $tg){ ?>
				<button class="botonEnlaceTag" onclick="buscarPorTag(<?php echo $tg->id; ?>)"><?php echo $tg->tag; ?></button><br />
			<?php }	
			?>
		</div>		
            </fieldset>
	</form>
	
	</div>
		
</div>
<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/pie.php");
?>
	