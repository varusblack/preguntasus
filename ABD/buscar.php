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
					<input id="palabras" type="text" />
				</div>				
				<div class="inputBusqueda separado">
					<select id="tag">
						<!-- Esta option está para comprobar la longitud del box para el CSS -->
						<option>Ingeniería del software de gestión III</option>
						<?php
							$conexion = crearConexion();
							$arrayTags = obtenerTodosLosTags($conexion);
							cerrarConexion($conexion);
							foreach($arrayTags as $tag){
								echo "<option>".$tag->__get("tag")."</option><br>";
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
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>
