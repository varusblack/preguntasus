<?php

echo show::mostrar("cabeceraHTML");
echo show::mostrar("cabecera");
echo show::mostrar("barraNavegacion");
?>
<div id="contenedor_cuerpo">
	<form>
		<div class="palabrasBuscar">
			<div class="palabras">
				Palabras clave:
			</div>
			<div class="inputPalabras">
				<label>
					<input id="escribirPalabra" type="text" />
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
					foreach ($parametro as $tag) {
						echo $tag->__get("tag");
						echo "<option>".$tag->__get('tag')."</option>";
					}
					
					?>
					
				</select>
			</div>
		</div>
		<div class="preguntas"></div>
	</form>
</div>
<?php
echo show::mostrar("pie");
?>
<?php
echo show::mostrar("pieHTML");
?>
