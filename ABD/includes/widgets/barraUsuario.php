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
            	<a href="perfil.php"><?php echo $usuario->email; ?></a>
                <label for="puntos">Puntos:</label>
                <span id="puntosUsuario"><?php echo $usuario->puntos;?></span> 
                <label for="numPreguntasUsuario">Preguntas realizadas: </label>
                <span id="numPreguntasUsuario"><?php echo $preguntasSesionUser;?></span> 
                <label for="numRespuestasUsuario">Preguntas respondidas: </label>
                <span id="numRespuestasUsuario"><?php echo $respuestasSesionUser;?></span>
                <a href="./procesado/logout.php">Logout</a>
            </fieldset>
        </div>
    </div>
</div>