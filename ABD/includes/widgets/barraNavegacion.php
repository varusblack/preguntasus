<div id="barraNavegacion">
	<div id="contenedorBarraNavegacion">
		<a href="/abd/index.php" class="enlaceNavegacion">Página principal</a>
		<a href="buscar.php?haBuscado=false" class="enlaceNavegacion separado">Buscar preguntas</a>
                <a href="clasificacion.php" class="enlaceNavegacion separado">Clasificación</a>	
		<?php 
			if($estaLogueado){
		?>
				<a href="/abd/procesado/preparaPreguntar.php" class="enlaceNavegacion separado">Preguntar</a>
				
		<?php
		if($esAdmin){
			?>
			<a href="/abd/menuadministrador.php" class="enlaceNavegacion separado">Menú administrador</a>
		<?php
		}
			}
		?>
			
	</div>	
</div>