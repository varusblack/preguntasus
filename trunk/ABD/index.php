<?php
	require_once ("./includes/styles/templates/cabecera.php");
	
	// $ruta = $_SERVER['REQUEST_URI'];
	// if ($ruta == '/ABD/') {
		// require_once ("./includes/widgets/login.php");
	// }
	require_once ("./includes/widgets/login.php");
	require_once ("./includes/widgets/barranavegacion.php");
?> 
<div id="contenedor_cuerpo">
	ContenedorCuerpo
	<div id="preguntas">
		<div class="pregunta">
			<div class="usuarioPregunta">
				<div class="fotoUsuarioPregunta">
					FOTITO
				</div>
				<div class="nombreUsuario">
					John Rambo
				</div>
				<div class="puntosUsuarioPregunta">
					<label class="puntos">Puntos:</label>20
				</div>
			</div>
			<div class="datosPregunta">			
				<div class="tituloPregunta">
					¿Esto funcionará?
				</div>
				<div class="estadisticasPregunta">					
					<label class="votos">Votos:</label>20			
					<label class="respuestas">Respuestas:</label>15				
					<label class="visitas">Visitas:</label>89					
				</div>
				<div class="tagsPregunta">
					<label class="tag1">Tag 1</label>
					<label class="tag2">Tag 2</label>
					<label class="tag3">Tag 3</label>
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









	