<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

    <head>
        <meta http-equiv="content-type" content="text/html; utf-8" />
        <title>Preguntas y respuestas US</title>
        <!-- Importacion de css -->
        <link type="text/css" rel="stylesheet" href="/abd/includes/styles/css/preguntasus.css" />
        <!-- Importacion de javascript -->
        <?php if (stripos($_SERVER['REQUEST_URI'], 'index') !== FALSE) { ?>
        	<script type="text/javascript" src="./includes/styles/js/preguntas.js"></script>
        <?php } ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'preguntaRespuesta') !== FALSE) { ?>
        
        <?php } ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'buscar') !== FALSE) { ?>
        	<script type="text/javascript" src="./includes/styles/js/preguntas.js"></script>
        <?php } ?>        
        <?php if (stripos($_SERVER['REQUEST_URI'], 'registrarse') !== FALSE) { ?>
            <script type="text/javascript" src="./includes/styles/js/registrarse.js"></script>
        <?php } ?>
        <?php if (stripos($_SERVER['REQUEST_URI'], 'login') !== FALSE) { ?>
        	<script type="text/javascript" src="./includes/styles/js/login.js"></script>
        <?php } ?>
    </head>
    <body>
