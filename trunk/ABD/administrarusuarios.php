<?php
	require_once ("./includes/styles/templates/cabecera.php");
?>
	<div id="contenedor_cuerpo">
		
		<div id="mensajesAdministracion">
		<?php 
		if(isset($_SESSION["mensaje"])){
			echo $_SESSION["mensaje"];
			unset($_SESSION["mensaje"]);
		}
		?>
			
		</div>
		
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
							if($usuario->tipousuario == 1){
								echo "Administrador";
							}else{
								echo "Usuario normal";
							}
							?></td>
						<td><a href="/abd/perfil.php?id=<?php echo $usuario->id;?>">
							<img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>
						</td>
						<td> 
							<a href="/abd/procesado/eliminaUsuario.php?id=<?php echo $usuario->id; ?>" onclick="return confirm('¿Está seguro de querer borrar este usuario?')">
							<img  src="./includes/styles/imagenes/iconos/eliminar.png" /></a>
							</td>
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