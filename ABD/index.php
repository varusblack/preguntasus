<?php
	require_once ("./includes/styles/templates/cabecera.php");
?> 
<div id="contenedor_cuerpo">
	<div id="preguntas">
		<?php 		
			$conexion = crearConexion();
			$arrayElementos = encontrarElementosOrdenadosPorFechaDecreciente($conexion);
			
			foreach ($arrayElementos as $elemento) {
				echo "hola";
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
				require("./includes/widgets/preguntas.php");
			}				
			cerrarConexion($conexion);		
		?>		
	</div>
	<div id="columna">
		<div id="cuadro_busqueda">
			<label for="buscar">Buscar:</label>
			<input type="text" id="buscar" name="buscar"/>
		</div>
		<div id="etiquetas_mas_frecuentes">

		</div>
	</div>
</div>
<?php
	require_once ("./includes/styles/templates/pie.php");
?>









	