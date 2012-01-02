<div class="pregunta">
	<div class="usuarioPregunta">
		<div class="fotoUsuarioPregunta">
			FOTITO
		</div>
		<div class="nombreUsuario">
			<?php echo $usuario->email; ?>
		</div>
		<div class="puntosUsuarioPregunta">
			<label class="puntos">Puntos:</label><?php echo $usuario->puntos; ?>
		</div>
	</div>
	<div class="datosPregunta">			
		<div class="tituloPregunta">
			<?php echo $elemento->titulo; ?>
		</div>
		<div class="estadisticasPregunta">					
			<label class="votos">Votos:</label><?php echo $numeroDeVotos; ?>			
			<label class="respuestas">Respuestas:</label><?php echo $numeroDeRespuestas; ?>				
			<label class="visitas">Visitas:</label><?php echo $numeroDeVisitas; ?>					
		</div>
		<div class="tagsPregunta">
			<span class="tag"><?php echo $tag1->tag; ?></span>
			<?php if(isset($tag2)){ ?>
				<span class="tag"><?php echo $tag2->tag; ?></span>
			<?php }
			if(isset($tag3)){ ?>
				<span class="tag"><?php echo $tag3->tag; ?></span>
			<?php }?>
		</div>
	</div>
</div>