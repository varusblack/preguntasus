<?php
	require_once ("./includes/styles/templates/cabecera.php");
?> 
<div id="contenedor_cuerpo">
	<table id="rankingUsuarios">
            
		<tr>
			<th>Foto</th>
                        <th>Correo ectrónico</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Puntos</th>
		</tr>
		<?php 
			$conexion = crearConexion();
			$arrayUsuarios = obtenerUsuariosPorPuntos($conexion);
			cerrarConexion($conexion);
			foreach ($arrayUsuarios as $usuario){ ?>
				<tr>
                                        <td><img src="/abd/muestraFoto.php?id=<? echo $usuario->id;?>&amp;tam=40" alt="fotoPerfil" /> </td>
					<td><?php echo $usuario->email; ?></td>
					<td><?php echo $usuario->nombre;?></td>
					<td><?php echo $usuario->apellidos;?></td>
					<td><?php echo $usuario->puntos;?></td>
				</tr>
		<?php	}
		?>
	</table>
</div>
<?php
	require_once ("./includes/styles/templates/pie.php");
?>
