<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

    <head>
        <meta http-equiv="content-type" content="text/html; utf-8" />
        <title>Preguntas y respuestas US</title>
        <!-- Importacion de css -->
        <link type="text/css" rel="stylesheet" href="/abd/includes/styles/css/preguntasus.css" />
        <!-- Importacion de javascript -->
        <?php 
        $patron = "#^/(abd|ABD)/$#"; ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'index') !== FALSE
			|| preg_match($patron, $_SERVER['REQUEST_URI']) > 0) { ?>
        	<script type="text/javascript" src="/ABD/includes/styles/js/preguntas.js"></script>
        <?php } ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'preguntaRespuesta') !== FALSE) { ?>
        	<script type="text/javascript" src="/ABD/includes/styles/js/validaFormularioRespuesta.js" ></script>
                <script type="text/javascript" src="/ABD/includes/styles/js/votar.js" ></script>
                <script type="text/javascript" src="/ABD/includes/styles/js/inicializaAjax.js" ></script>
        <?php } ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'preparaPreguntar') !== FALSE) { ?>
        	<script type="text/javascript" src="/ABD/includes/styles/js/validaFormularioPregunta.js"></script>
        <?php } ?>         
        <?php if (stripos($_SERVER['REQUEST_URI'], 'buscar') !== FALSE) { ?>
        	<script type="text/javascript" src="/ABD/includes/styles/js/preguntas.js"></script>
        <?php } ?>        
        <?php if (stripos($_SERVER['REQUEST_URI'], 'registrarse') !== FALSE) { ?>
            <script type="text/javascript" src="/ABD/includes/styles/js/registrarse.js"></script>
        <?php } ?>
            <?php if (stripos($_SERVER['REQUEST_URI'], 'perfil') !== FALSE) { ?>
            <script type="text/javascript" src="/ABD/includes/styles/js/registrarse.js"></script>
        <?php } ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'login') !== FALSE) { ?>
        	<script type="text/javascript" src="/ABD/includes/styles/js/login.js"></script>
        <?php } ?>
    </head>
    <body>
<?php    	
    @session_start();
    require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/conexionesBD.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosElemento.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosTag.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosTagsDeElementos.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosUsuario.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosVisita.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/accesosBD/accesosVotacion.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Tag.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Elemento.php");
	require_once ($_SERVER["DOCUMENT_ROOT"]."/abd/entidades/Usuario.php" );
	
	$usuario="";
	if(isset($_SESSION["usuario"])){
		$usuario=unserialize($_SESSION["usuario"]);
		require ($_SERVER["DOCUMENT_ROOT"]. '/abd/includes/widgets/barraUsuario.php');
		$esAdmin = $usuario->tipousuario;
		$estaLogueado=true;
	}else{
		$estaLogueado=false;
		require ($_SERVER["DOCUMENT_ROOT"]. '/abd/includes/widgets/login.php');
		
	}
	require ($_SERVER["DOCUMENT_ROOT"]. '/abd/includes/widgets/barranavegacion.php');

?>