<div class="pregunta">
	<div class="usuarioPregunta">
		<div class="fotoUsuarioPregunta">
			FOTITO
		</div>
		<div class="nombreUsuario">
			<?php $usuario->email;?>
		</div>
		<div class="puntosUsuarioPregunta">
			<label class="puntos">Puntos:</label><?php $usuario->puntos;?>
		</div>
	</div>
	<div class="datosPregunta">			
		<div class="tituloPregunta">
			<?php $elemento->titulo;?>
		</div>
		<div class="estadisticasPregunta">					
			<label class="votos">Votos:</label><?php $numeroDeVotos?>			
			<label class="respuestas">Respuestas:</label><?php $numeroDeRespuestas?>				
			<label class="visitas">Visitas:</label><?php $numeroDeVisitas?>					
		</div>
		<div class="tagsPregunta">
			<label class="tag1"><?php $tag1?></label>
			<label class="tag2"><?php $tag2?></label>
			<label class="tag3"><?php $tag3?></label>
		</div>
	</div>
</div>