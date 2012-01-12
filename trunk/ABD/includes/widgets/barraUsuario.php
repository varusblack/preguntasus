<div id="barraUsuario">
    <div id="barraUsuario-content">
        <div id="logo">
            <h1>PREGUNTAS US</h1>
        </div>
        <div id="user-box">
            <fieldset>            
            	<?php 
				$conexion = crearConexion();
				$preguntasSesionUser = count(encontrarElementosDeUsuario($usuario,$conexion));
				$respuestasSesionUser = count(encontrarRespuestasDeUsuario($usuario,$conexion));
				cerrarConexion($conexion);
                                
?>
<!-- Imagen del usuario logeado -->
				<div id="imagenUserBox">
	                <img src="/abd/muestraFoto.php?id=<? echo $usuario->id;?>&amp;tam=40" alt="fotoPerfil" />
				</div>

<!-- Estadísticas del usuario logeado -->
				<div id="camposUserBox">
	            	<a href="/abd/perfil.php"><?php echo $usuario->email; ?></a>
	                <span>Puntos:</span>
	                <span id="puntosUsuario"><?php echo $usuario->puntos;?></span> 
	                <span>Preguntas realizadas: </span>
	                <span id="numPreguntasUsuario"><?php echo $preguntasSesionUser;?></span> 
	                <span>Preguntas respondidas: </span>
	                <span id="numRespuestasUsuario"><?php echo $respuestasSesionUser;?></span>
	                <a href="/ABD/procesado/logout.php">Logout</a>
				</div>	
            </fieldset>
        </div>
    </div>
</div>