<?php
	require_once ("./accesosBD/conexionesBD.php");
	require_once ("./accesosBD/accesosElemento.php");
	require_once ("./accesosBD/accesosTag.php");
	require_once ("./accesosBD/accesosTagsDeElementos.php");
	require_once ("./accesosBD/accesosUsuario.php");
	require_once ("./accesosBD/accesosVisita.php");
	require_once ("./accesosBD/accesosVotacion.php");
	require_once ("./entidades/Tag.php");
	require_once ("./entidades/Elemento.php");
	require_once ("./entidades/Usuario.php" );
	
	require_once ("./includes/styles/templates/cabecera.php");
	
	// $ruta = $_SERVER['REQUEST_URI'];
	// if ($ruta == '/ABD/') {
		// require_once ("./includes/widgets/login.php");
	// }
	

	/*
	 * Se inicializa la sesion y se crea la variable de sesión usuario y errores
	 * Se comprueba posteriormente que si la variable está creada se inicialize a ""
	 * para evitar cambios en el tipo de usuario, ej 1 para el administrador
	 */
	session_start();
	
	if(isset($_SESSION["usuario"])){
		$usuario=unserialize($_SESSION["usuario"]);
		require_once ("./includes/widgets/barraUsuario.php");
	}else{
		require_once ("./includes/widgets/login.php");
	}

	require_once ("./includes/widgets/barranavegacion.php");	
?> 
<div id="contenedor_cuerpo">
	<div id="preguntas">
		<?php 		
			$conexion = crearConexion();
			$arrayElementos = encontrarElementosOrdenadosPorFechaDecreciente($conexion);
			
			foreach ($arrayElementos as $elemento) {
				$idUsuario = $elemento->idautor;
				
				/*
				 *Solo deben de mostrarse los elementos que tenga contenido en cuerpo
				 * caso contrario serán respuestas. 
				 */
				
				$idpregunta = $elemento->id;
				$usuario = obtenerUsuarioPorId($idUsuario, $conexion);
				$numeroDeVotos = obtenerNumeroDeVotosDeElemento($elemento, $conexion);
				$numeroDeRespuestas = obtenerNumeroDeRespuestasDeElemento($elemento, $conexion);
				$numeroDeVisitas = obtenerNumeroDeVisitasDeElemento($elemento, $conexion);
				$tag1 = NULL;
				$tag2 = NULL;
				$tag3 = NULL;
				
				$resTags = obtenerTagsDeElemento($elemento, $conexion);		
				$contador = 1;			
				foreach ($resTags as $tg) {
					if ($contador == 1) {
						$tag1 = $tg;
						$contador = $contador+1;
					}
					if ($contador == 2) {
						$tag2 = $tg;
						$contador = $contador+1;
					}
					if ($contador == 3) {
						$tag3 = $tg;
						$contador = $contador+1;
					}
					if ($contador > 3) {
						break;
					}
				}						
				require("./includes/widgets/preguntas.php");
			}				
			cerrarConexion($conexion);		
		?>		
	</div>
	<div id="columna">
		Columna
		<div id="cuadro_busqueda">
			Cuadro de busqueda <label for="buscar">Buscar:</label>
			<input type="text" id="buscar" name="buscar"/>
		</div>
		<div id="etiquetas_mas_frecuentes">
			Nube de etiquetas
		</div>
	</div>
</div>
<?php
	require_once ("./includes/styles/templates/pie.php");
?>









	