<?php
require $_SERVER['DOCUMENT_ROOT']."/preguntasus/lib/autoloader.php";
echo show::mostrar("cabeceraHTML");
echo show::mostrar("cabecera");

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
        <fieldset>
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
        </fieldset>
    </form>
</div>
    <?php
    echo show::mostrar("pie");
    ?>
<?php
echo show::mostrar("pieHTML");
?>
