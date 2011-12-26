<?php
	require_once ("./includes/styles/templates/cabecera.php");
	
	$ruta = $_SERVER['REQUEST_URI'];
	if ($ruta == '/ABD/') {
		require_once ("./includes/widgets/login.php");
	}
	
	require_once ("./includes/widgets/barranavegacion.php");
?>
<div id="contenedor_cuerpo">
	ContenedorCuerpo
	<div id="preguntas">
		ContenedorPreguntas
		<div class="pregunta">
			Pregunta
			<div class="usuario_que_pregunta">
				Usuario preguntador
			</div>
			<div class="preguntaConcreta">
				Contenedor pregunta concreta
				<div class="tituloPregunta">
					Titulo de la pregunta
				</div>
				<div class="estadisticasPregunta">
					Estadisticas de la pregunta
				</div>
			</div>
		</div>
	</div>
	<div id="columna">
		Columna
		<div id="cuadro_busqueda">
			Cuadro de busqueda <label for="buscar">Buscar:</label>
			<input type="text" id="buscar" name="buscar"/>
		</div>
		<div id="etiquetas_mas_frecuentes">
			Nube de etiquetas
		</div>
	</div>
</div>
<?php
	require_once ("./includes/styles/templates/pie.php");
?>
	