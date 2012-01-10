<div class="campo">
    <div class="labels">
        <label for="emailUsuario">E-mail:</label>
    </div>

    <input id="emailUsuario" type="text" name="email" value="<?php echo $email; ?>"/>

</div>
<div class="campo">
    <div class="labels">
        <label for="pass1">Contraseña:</label>
    </div>
    <input id="pass1" type="password" name="pass1" />
</div>
<div class="campo">
    <div class="labels">
        <label for="pass2">Verifique contraseña:</label>
    </div>
    <input id="pass2" type="password" name="pass2" />
</div>
<div class="campo">
    <div class="labels">
        <label for="nombre">Nombre:</label>
    </div>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
</div>

<div class="campo">
    <div class="labels">
        <label for="apellidos">Apellidos:</label>

    </div>
    <input type="text" id="apellidos" name="apellidos"  value="<?php echo $apellidos; ?>"/>
</div>
<div class="campo">
    <div class="labels">
        <label for="fechaNacimiento">Fecha de nacimiento:</label>
    </div>
    <input type="text" id="fechaNacimiento" name="fechaNacimiento"  value="<?php echo $fechaNacimiento; ?>"/>
</div>
<div class="campo">
    <div class="labels">
        <label for="fotoPerfil">Foto de perfil:</label>
    </div>
    <input type="file" id="fotoPerfil" name="fotoPerfil" />
</div>
<?php 
	if($usRecuperado->tipousuario){ ?>
		<div class="campo">
			<div class="labels">
				<label for="tipoUsuario">Tipo de usuario:</label>
			</div>
			<?php
				if($usuarioLogueado->tipousuario){
					$esAdmin = "checked";
					$noAdmin = NULL;
				}else{
					$esAdmin = NULL;
					$noAdmin = "checked";
				}
			?>
			Administrador<input type=radio name="tipoUsuario" value="1" <?php echo $esAdmin; ?>>
			U. Normal<input type=radio name="tipoUsuario" value="1" <?php echo $noAdmin; ?>> 
		</div>
<?php }
?>

