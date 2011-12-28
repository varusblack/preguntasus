<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
?>

<div id="contenedor_cuerpo">
<?
if(isset($parametros["errores"])){
	echo show::mostrar("erroresRegistro",$parametros["errores"]);
	$datos=$parametros["datos"];
}else{
	$datos=array();
	$datos["email"]="Valor por dafecto del email";
}
?>
    <form name="datos" method="post" action="../modulos/procesaRegistro.php">
    	<div id="cuadroRegistrarse">
	    	<div id="labelsRegistrarse">
	    		<div class="labelRegistrarse">
	    			<label for="email">E-mail:</label>
	    		</div>
	    		<div class="labelRegistrarse separado">
	    			<label for="pass1">Contraseña:</label>
	    		</div>
	    		<div class="labelRegistrarse separado">
	    			<label for="pass2">Verifique contraseña:</label>
	    		</div>
	    		<div class="labelRegistrarse separado">
	    			<label for="nombre">Nombre:</label>
	    		</div>
	    		<div class="labelRegistrarse separado">
	    			<label for="apellidos">Apellidos:</label>
	    		</div>
	    		<div class="labelRegistrarse separado">
	    			<label for="fechaNacimiento">Fecha de nacimiento</label>
	    		</div>
	    	</div>
	    	<div id="inputsRegistrarse">
	    		<div class="inputRegistrarse">
	    			<input id="email" type="text" name="email" value="<?php echo $datos['email'];?>"/>
	    		</div>
	    		<div class="inputRegistrarse separado">
	    			<input id="pass1" type="password" name="pass1" />
	    		</div>
	    		<div class="inputRegistrarse separado">
	    			<input id="pass2" type="password" name="pass2" />
	    		</div>
	    		<div class="inputRegistrarse separado">
	    			<input type="text" id="nombre" name="nombre" />
	    		</div>
	    		<div class="inputRegistrarse separado">
	    			<input type="text" id="apellidos" name="apellidos" />
	    		</div>
	    		<div class="inputRegistrarse separado">
	    			<input type="text" id="fechaNacimiento" name="fechaNacimiento" />
	    		</div>
	    	</div>
	    	<div id="botonRegistrarse">
	    		<input type="submit" value="Enviar"/>
	    	</div>
    	</div>
    	
    	
    	
    	
        <!-- <fieldset>
            <label for="email">E-mail:</label>
            <input id="email" type="text" name="email" value="<?php echo $datos['email'];?>"/>
            <label for="pass1">Contraseña:</label>
            <input id="pass1" type="password" name="pass1" />
            <label for="pass2">Verifique contraseña:</label>
            <input id="pass2" type="password" name="pass2" />
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" />
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" />
            <label for="fechaNacimiento">Fecha de nacimiento</label>
            <input type="text" id="fechaNacimiento" name="fechaNacimiento" />
            
            <input type="submit" />
        </fieldset> -->
    </form>
</div>
<?php
	require_once ("./includes/styles/templates/pie.php");
?>