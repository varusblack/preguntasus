<?php

echo show::mostrar("cabeceraHTML");
echo show::mostrar("cabecera");
echo show::mostrar("barraNavegacion");

?>
<div id="contenedor_cuerpo">
	<form id="buscadorPreguntas" name="buscadorPreguntas" action="buscarPreguntas.php">
		<div class="palabrasBuscar">
			<div class="palabras">
				Palabras clave:
			</div>
			<div class="inputPalabras">
				<label>
					<input id="palabra" type="text" />
				</label>
			</div>
		</div>
		<div class="buscarTags">
			<div class="tags">
				Tag:
			</div>
			<div class="inputTag">
				<label for="selectTags">Selecciona tag:  </label>
				<select id="selectTags">
					
					<?php
					foreach ($parametro["tags"] as $tag) {
						echo $tag->__get("tag");
						echo "<option>".$tag->__get('tag')."</option>";
					}
					
					?>
					
				</select>
			</div>
		</div>
		<div id="botonBuscar">
			<input type="submit" value="Buscar" />
		</div>
		<div id="preguntas"><?php
	echo show::mostrar("listaPreguntas",$parametro["elementos"]);
?></div>
	</form>
	
</div>
<?php
echo show::mostrar("pie");
?>
<?php
echo show::mostrar("pieHTML");
?>
