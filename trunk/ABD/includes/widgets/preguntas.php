<?php 
if($numeroDeRespuestas<1){
	echo "<div class='pregunta'>";
}else{
	echo "<div class='preguntaRespondida'>";
}
?>
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
			<a href="./preguntaRespuesta.php?idsolicitado=<?echo $idpregunta;?>"><?php echo $elemento->titulo; ?></a>
		</div>
		<div class="estadisticasPregunta">					
			<label class="votos">Votos:</label>
			<span class="numeroVotos"><?php echo $numeroDeVotos; ?></span>			
			<label class="respuestas">Respuestas:</label>
			<span class="numeroRespuestas"><?php echo $numeroDeRespuestas; ?></span>				
			<label class="visitas">Visitas:</label>
			<span class="numeroVisitas"><?php echo $numeroDeVisitas; ?></span>					
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