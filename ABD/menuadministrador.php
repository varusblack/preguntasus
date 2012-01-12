<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/cabecera.php");
?> 
	<div id="contenedor_cuerpo">
<!-- 	Enlace a administración de usuarios	 -->
		<div id="enlaceAdministrarUsuarios" class="enlaceAdministracion">
			<a href="administrarusuarios.php">
				<img  src="/abd/includes/styles/imagenes/iconos/botonAdministrarUsuarios.png" />
			</a>
		</div>
		
<!-- 	Enlace a administración de tags	 -->
		<div id="enlaceAdministrarTags" class="enlaceAdministracion">
			<a href="administrartags.php">
				<img  src="/abd/includes/styles/imagenes/iconos/botonAdministrarTags.png" />
			</a>
		</div>
		
<!-- 	Enlace a administración de preguntas	 -->
		<div id="enlaceAdministrarPreguntas" class="enlaceAdministracion">
			<a href="administrarpreguntas.php">
				<img  src="/abd/includes/styles/imagenes/iconos/botonAdministrarPreguntas.png" />
			</a>
		</div>
	</div>

<?php
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/includes/styles/templates/pie.php");
?>