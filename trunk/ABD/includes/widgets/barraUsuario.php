<div id="barraUsuario">
    <div id="barraUsuario-content">
        <div id="logo">
            <h1>PREGUNTAS US</h1>
        </div>
        <div id="user-box">
            <fieldset>            
            	<?php 
            	$sesionUser = $_SESSION["usuario"];
				$conexion = crearConexion();
				$preguntasSesionUser = count(encontrarElementosDeUsuario($sesionUser,$conexion));
				$respuestasSesionUser = count(encontrarRespuestasDeUsuario($sesionUser,$conexion));
				cerrarConexion($conexion);
            	?>	
            	<a href="perfil.php"><?php ?></a>
                <label for="puntos">Puntos:</label>
                <span id="puntosUsuario"><?php echo $sessionUser->puntos;?></span> 
                <label for="numPreguntasUsuario">Preguntas realizadas: </label>
                <span id="numPreguntasUsuario"><?php echo $preguntasSesionUser;?></span> 
                <label for="numRespuestasUsuario">Preguntas respondidas: </label>
                <span id="numRespuestasUsuario"><?php echo $respuestasSesionUser;?></span>
            </fieldset>
        </div>
    </div>
</div>