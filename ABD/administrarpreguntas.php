<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/cabecera.php");
?> 
	<div id="contenedor_cuerpo">
		
		<table id="tabla">
			<tr>
				<th>Título</th>
				<th>Autor</th>
				<th>Fecha de pregunta</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
			<?php 
				$conexion = crearConexion();
				$elementosAdministrados = encontrarPreguntas($conexion);
				
				foreach($elementosAdministrados as $elemento){ 
					$usuarioAutor = obtenerUsuarioPorId($elemento->idautor,$conexion);
					?>
					<tr>
						<td><?php echo $elemento->titulo;?> </a></td>
						<td><?php echo $usuarioAutor->email;?></td>
						<td><?php echo $elemento->fechapregunta;?></td>
						<td><a href="./procesado/preparaModificaRespuesta.php?cod=<?echo $elemento->id;?>&codigoPregunta=<?echo $elemento->id;?>">
							<img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>
						</td>
						<td>
							<a href="./procesado/preparaEliminaRespuesta.php?cod=<?echo $elemento->id;?>&codigoPregunta=<?echo $elemento->id;?>">
								<img  src="./includes/styles/imagenes/iconos/eliminar.png" /></a>
						</td>
					</tr>
					
			<?php	}
				cerrarConexion($conexion);				
			?>
			
		</table>
		
	</div>

<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/pie.php");
?>