<div id="barraNavegacion">
	<div id="contenedorBarraNavegacion">
		<a href="index.php" class="enlaceNavegacion">Página principal</a>
		<a href="buscar.php?haBuscado=false" class="enlaceNavegacion separado">Buscar preguntas</a>	
		<?php 
			if($estaLogueado){
		?>
				<a href="preguntar.php" class="enlaceNavegacion separado">Preguntar</a>
				
		<?php
		if($esAdmin){
			?>
			<a href="menuadministrador.php" class="enlaceNavegacion separado">Menú administrador</a>
		<?php
		}
			}
		?>
			
	</div>	
</div>