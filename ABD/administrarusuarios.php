<?php
	require_once ("./includes/styles/templates/cabecera.php");
?>
	<div id="contenedor_cuerpo">
		
		<table id="tabla">
			<tr>
				<th>Correo electrónico</th>
				<th>Contraseña</th>
				<th>Fecha de registro</th>
				<th>Tipo de usuario</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
			
			<?php 
				$conexion = crearConexion();
				$usuariosAdministrados = obtenerTodosLosUsuarios($conexion);
				foreach($usuariosAdministrados as $usuario){ ?>
					<tr>
						<td><?php echo $usuario->email; ?></td>
						<td><?php echo $usuario->password;?></td>
						<td><?php echo $usuario->fecharegistro;?></td>
						<td><?php 
							if($usuario->tipousuario == 0){
								echo "Administrador";
							}else{
								echo "Usuario normal";
							}
							?></td>
						<td><a href="/abd/perfil.php?id=<?php echo $usuario->id;?>">
							<img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>
						</td>
						<td><?php ?></td>
					</tr>					
					
			<?php	
				}
				cerrarConexion($conexion);
			?>
			
			
			
		</table>
		
	</div>

<?php
	require_once ("./includes/styles/templates/pie.php");
?>