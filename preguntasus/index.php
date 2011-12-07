<?php
require "lib/autoloader.php";
echo show::mostrar("cabeceraHTML");
echo show::mostrar("cabecera");

$el=new ElementoImpl();
$el->getById(1);

echo $el->__get("titulo");

//foreach ($el as $linea){
//   echo "<p>a".$linea->__get("titulo");
//}

?>
<div id="contenedor_cuerpo">
    ContenedorCuerpo
    <div id="preguntas">
        ContenedorPreguntas
        <div class="pregunta">
            Pregunta
            <div class="usuario_que_pregunta">
                Usuario preguntador
            </div>
            <div class="preguntaConcreta">
                Contenedor pregunta concreta
                <div class="tituloPregunta">
                    Titulo de la pregunta
                </div>
                <div class="estadisticasPregunta">
                    Estadisticas de la pregunta
                </div>
            </div>
        </div>
    </div>
    <div id="columna">
        Columna
        <div id="cuadro_busqueda">
            Cuadro de busqueda
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
