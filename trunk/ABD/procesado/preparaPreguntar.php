<?php
require_once ("../includes/styles/templates/cabecera.php");
$usuario=unserialize($_SESSION['usuario']);
$formularioPregunta="";
if (isset($_SESSION["formularioPregunta"])) { // si la variable formulario existe y esta vacia, ES LA 1ª VEZ QUE ENTRAMOS
	$formularioPregunta = $_SESSION['formularioPregunta']; // se crea una variable formulario 
	$errores = $_SESSION['errores']; //  y errores dentro de la sesion
	unset($_SESSION["formularioPregunta"]);
	unset($_SESSION["errores"]);
 	$formularioPregunta['titulo'] = "";
	
}
if (isset($errores) && count($errores)>0) {
	 echo "<div id=\"div_errores\" class=\"error\">";    
    foreach($errores as $error) {
      echo $error . "<br/>"; 
    }
    echo "</div>";
  }
?>
<form id="nuevaPregunta" action="nuevaPregunta.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validaPregunta()">
	<div id="cuadropregunta">
		<h2 class="rotulos">Introduzca Los Datos Necesarios Para La Nueva Pregunta</h2>
		<div id="div_datosUsuario">
			<label class="etiquetaPregunta">Email Del Autor :</label>
			<span id="emailCuadroPregunta"><?php echo $usuario->email;?></span>		
		</div>
		<div id="div_datosPregunta">
			<label for="titulo" class="etiquetaPregunta">Titulo:</label><br />
			<label for="cuerpo" class="etiquetaPregunta">Cuerpo De La Pregunta</label><br />
			<label for="ta" class="etiquetaPregunta">Selecciona Etiqueta</label>
		</div>
		<div id ="div_camposPregunta">
			<input id="tituloPregunta" name="titulo" type="text"/><br />
			<input />
		</div>
		<div id="div_seleccionaTag">			
				<select id="tag" name="tag">
					<option></option>
					<?php
						$conexion = crearConexion();
						$arrayTags = obtenerTodosLosTags($conexion);
 						cerrarConexion($conexion);
						foreach($arrayTags as $tg){
							echo "<option value='$tg->id'>".$tg->tag."</option><br />";
						}					
					?>
				</select>
		</div>
		<div id="div_respuesta">
			<textarea class="cuerpo" id="cuerpoPregunta" name="cuerpo" tabindex="101" rows="5" cols="83" ></textarea>
		</div>		
		<div id="div_botonConfirmaPregunta">
			<button  id="submit" type="submit" >Aceptar Nueva Pregunta</button>
		</div>
	</div>	
</form>

<?php
	require_once ("../includes/styles/templates/pie.php");
?>
