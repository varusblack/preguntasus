<?php
require "c:/xampp/htdocs/preguntasus/lib/autoloader.php";
echo show::mostrar("cabeceraHTML");
echo show::mostrar("cabecera");

?>
<div class="container">
	<div id="header">
		
	</div>
	<div id="content">
		<div id="pregunta">
			<h3 class="rotuloComun">La pregunta con sus votaciones es</h3>
			<table border="1" summary="Tabla de fijacion del contenido de la pregunta">
				<th>VOTOS</th>
				<th>PREGUNTA</th>
				<tr>
					<td>******</td>
					<td>TEXTO DE LA PREGUNTA</td>
				</tr>
			</table>
		</div>
		<div id="respuesta">
			
			<table border="1" summary="Tabla para las respuestas">
				<h3 class="rotuloComun">Las Respuestas publicadas para esta pregunta son:</h3>
				<th>USUARIO</th>
				<th>RESPUESTA</th>
				<tr>
					<td>NOMBRE DE USUARIO</td>
					
					<td>TEXTO DE LA RESPUESTA</td>
				</tr>
			</table>			
		</div>
		<form id="mi_respuesta">
			<h3 class="rotuloComun">Mi Respuesta Aportada es</h3>
			<textarea id="imput-respuesta" tabindex="101" rows="15" cols="92" name="mi-respuesta">
			</textarea>
			<div id="div_botones">
          			<input id="submit" type="submit" value="Publicar Mi Respuesta" />
          			<input id ="reset" type="reset" value="Limpiar Respuesta"/>
        		</div>		
		</form>
	</div>
	
</div>

 <?php
    echo show::mostrar("pie");
    ?>
<?php
echo show::mostrar("pieHTML");
?>