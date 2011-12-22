<?php
require "lib/autoloader.php";
echo show::mostrar("cabeceraHTML");
echo show::mostrar("cabecera");
echo show::mostrar("barraNavegacion");

// echo session_id();

//$el=new ElementoImpl();
//foreach($el as $e){
//    print_r($e->current());
//}

?>
<div id="contenedor_cuerpo">
    ContenedorCuerpo
    <div id="preguntas">
<?php
	echo show::mostrar("listaPreguntas",array());
?>
    </div>
    <div id="columna">
        Columna
        <div id="cuadro_busqueda">
            Cuadro de busqueda
            <label for="buscar">Buscar:</label>
            <input type="text" id="buscar" name="buscar"/>
        </div>
        <div id="etiquetas_mas_frecuentes">
            Nube de etiquetas
        </div>
    </div>
</div>
    <?php
    echo show::mostrar("pie");
    ?>
<?php
echo show::mostrar("pieHTML");
?>
