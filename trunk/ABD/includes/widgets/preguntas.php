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
			<label class="tag"><?php $tag1?></label>
			<?php if(isset($tag2)){ ?>
				<label class="tag"><?php $tag2?></label>
			<?php }
			if(isset($tag3)){ ?>
				<label class="tag"><?php $tag3?></label>
			<?php }?>
		</div>
	</div>
</div>