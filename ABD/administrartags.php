<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/cabecera.php");
?> 
	<div id="contenedor_cuerpo">
		
		<div id="mensajesAdministracion">
			<?php 
			if(isset($_SESSION["mensajes"])){
				echo $_SESSION["mensajes"];
				unset($_SESSION["mensajes"]);
			}
			?>
		</div>
		
		<div id="erroresTag" class="errores">
			<?php 
			if(isset($_SESSION["error"])){
				echo $_SESSION["error"];
				unset($_SESSION["error"]);
			}
			?>
		</div>
		
		<table id="tabla">
			<tr>
				<th>Nombre del tag</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
			<?php
				$conexion = crearConexion();
				$tagsAdministrados = obtenerTodosLosTags($conexion);
				foreach ($tagsAdministrados as $tag){ ?>
					<tr>
						<td><?php echo $tag->tag;?></td>
						<td><?php ?>
							<img  src="./includes/styles/imagenes/iconos/editar.jpg" alt="editar" />
						</td>
						<td>
							<a href="/abd/procesado/eliminaTag.php?id=<?php echo $tag->id; ?>" onclick="return confirm('¿Está seguro de querer borrar este tag?')">
							<img  src="./includes/styles/imagenes/iconos/eliminar.png" alt="eliminar" /></a>
						</td>
					</tr>
					
			<?php	}
				cerrarConexion($conexion);
			?>
			
		</table>
		
		
		
		<div id="cuadroTag">
			<form id="crearTag" method="post" action="/abd/procesado/creaTag.php" onsubmit="">
				<div id="datosCreacionTag">
					<label for="nombreTag" id="label_nombreTag">Nombre del tag:</label>
					<input type="text" id="nombreTag" name="nombreTag" />
				</div>
				<div id="botonCrearTag">
					<input type="submit" name="crear" value="Crear" />
				</div>
			</form>
		</div>
		
	</div>

<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/pie.php");
?>