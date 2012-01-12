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
// Si el usuario que está visitando la página es administrador se dará la posibilidad
// de editar el rol del usuario cuyo perfil esta siendo visitado
	if(@$usRecuperado->tipousuario){ ?>
		<div class="campo">
			<div class="labels">
				<label for="tipoUsuario1" >Tipo de usuario:</label>
			</div>
			<?php
				if($usuarioLogueado->tipousuario){
					$esAdmin = "checked";
					$noAdmin = NULL;
				}else{
					$esAdmin = NULL;
					$noAdmin = "checked";
				}
                                $emailAntiguo=$usuarioLogueado->email;
			?>
			Administrador<input id="tipoUsuario1" type=radio name="tipoUsuario" value="1" <?php echo $esAdmin; ?> />
			U. Normal<input id="tipoUsuario2" type=radio name="tipoUsuario" value="0" <?php echo $noAdmin; ?> /> 
                        <input type="hidden" name="antiguoemail" id="antiguoemail" value="<?echo $emailAntiguo;?>" />
		</div>
<?php }
?>

