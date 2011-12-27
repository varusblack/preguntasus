<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
require_once ("./accesosBD/conexionesBD.php");
require_once ("./accesosBD/accesosTag.php");
require_once ("./entidades/Tag.php");
?>
<div id="contenedor_cuerpo">
	<form id="buscadorPreguntas" name="buscadorPreguntas" action="buscarPreguntas.php">
		<div class="palabrasBuscar">
			<div class="palabras">
				Palabras clave:
			</div>
			<div class="inputPalabras">
				<label>
					<input id="palabra" type="text" />
				</label>
			</div>
		</div>
		<div class="buscarTags">
			<div class="tags">
				Tag:
			</div>
			<div class="inputTag">
				<label for="selectTags">Selecciona tag: </label>
				<select id="selectTags">
					<?php
						$conexion = crearConexion();
						$arrayTags = obtenerTodosLosTags($conexion);
						cerrarConexion($conexion);
						foreach($arrayTags as $tag){
							echo "<option>".$tag->__get("tag")."</option>";
						}					
					?>
				</select>
			</div>
		</div>
		<div id="botonBuscar">
			<input type="submit" value="Buscar" />
		</div>
		<div id="preguntas"></div>
	</form>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>
