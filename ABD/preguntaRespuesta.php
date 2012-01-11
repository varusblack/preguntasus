<?php
require_once ("./includes/styles/templates/cabecera.php");
//session_start();
/*
 * 
 * Se crea una variable nuevaRespuesta y errores en la sesión actual 
 * Con el isset si es la primera vez que entramos en preguntaRespuesta.php, inicializamos la variable a vacio
 * para evita que se rellene o almacene contenido anterior 
 */

//$nuevaRespuesta=$_SESSION['nuevaRespuesta'];
//$errores=$_SESSION['errores'];
$conexion = crearConexion();
$elemento = new Elemento();
$idelemento = $_REQUEST['idsolicitado']; // Para cuando se pulse la pregunta en index.php 
$elemento = encontrarElementoPorId($idelemento, $conexion);
if (isset($_SESSION['usuario'])) {
    $accedeUsuario = unserialize($_SESSION['usuario']);
    $tipoUsuario = $accedeUsuario->tipousuario;
    insertarVisita($elemento, $accedeUsuario, $conexion);
}
if (!isset($nuevaRespuesta)) {
    $nuevaRespuesta['respuesta'] = "";
    $nuevaRespuesta['elemento'] = $elemento;
    $nuevaRespuesta['idelemento'] = $idelemento;
}

if (!empty($errores)) {
    echo "<div id=\"div_errores\" class=\"error\">";
    echo $errores . "<br/>";
    echo "</div>";
}
?>

<body>
    <div class="container">
        <div id="content">
            <fieldset id="recuadroPregunta" >
                <div id="div_titulo">
                    <span class="label_preguntaRespuesta">Titulo:</span>
                    <span class="label_preguntaRespuesta"><? echo($elemento->titulo); ?></span>
                </div>
                <div id="div_cuerpo">
                    <span class="label_preguntaRespuesta" >Contenido:</span>
                    <span class="label_preguntaRespuesta"><? echo($elemento->cuerpo); ?></span>
                </div>
                <div id="div_numerorespuestas">				
                    <span class="label_preguntaRespuesta" >Numero de Respuestas Publicadas:</span>
                    <span class="label_preguntaRespuesta"><? echo(obtenerNumeroDeRespuestasDeElemento($elemento, $conexion)); ?></span>
                </div>
                <div id="votosPregunta">				
                    <span class="label_preguntaRespuesta">Número de votos:</span>
                    <span class="label_preguntaRespuesta" id="votos<?php echo$elemento->id; ?>" ><? echo(obtenerNumeroDeVotosDeElemento($elemento, $conexion)); ?>
                        <?
                        if (isset($_SESSION["usuario"])) {
                            if (!usuarioHaVotadoAElemento($elemento, $usuario, $conexion)) {
                                ?>   

                                <a href="#" onclick="votar(<? echo "$usuario->id,$elemento->id"; ?>)"> Votar</a></span>
                                <?
                            }
                        }
                        ?>
                </div>
            </fieldset>
            <div id="respuesta">	
                <?
                $respuestas = array();
                $respuestas = encontrarRespuestas($elemento, $conexion);
                $elementoRespuesta = new Elemento();
                $cont = 1;
                ?>
                <table width="90%">
                    <tr align="left" >
                        <?
                        if (isset($_SESSION['usuario'])) {// Si existe el usuario logado
                            if ($tipoUsuario == 1) { //Si es administrador	
                                ?>
                                <th>Modifica</th>
                                <th>Elimina</th>
                            <? }
                        } ?>
                        <th>Votos</th>
                        <th width="90%">Contenido De La Respuesta</th>
                    </tr>
                    <?
                    foreach ($respuestas as $res) {
                        ?>
                        <tr align="left" >
                            <?
                            if (isset($_SESSION['usuario'])) {// Si existe el usuario logado
                                if ($tipoUsuario == 1) { //Si es administrador				
                                    ?>
                                    <td>
                                        <a href="./procesado/preparaModificaRespuesta.php?cod=<? echo $res->id ?>&codigoPregunta=<? echo $idelemento ?>"><img  src="./includes/styles/imagenes/iconos/editar.jpg" /></a>						
                                    </td>						 	
                                    <td>
                                        <a href="./procesado/preparaEliminaRespuesta.php?cod=<? echo $res->id ?>&codigoPregunta=<? echo $idelemento ?>"><img  src="./includes/styles/imagenes/iconos/eliminar.png" /></a>						
                                    </td>
                                    <?
                                }
                            }
                            ?>
                            <td><span class="label_preguntaRespuesta" id="votos<?php echo $res->id; ?>">
                                    <?php
                                    $votos = obtenerNumeroDeVotosDeElemento($res, $conexion);
                                    echo $votos;

                                    if (isset($_SESSION["usuario"])) {
                                        if (!usuarioHaVotadoAElemento($res, $usuario, $conexion)) {
                                            ?>

                                            <a href="#" onclick="votar(<? echo "$usuario->id,$res->id"; ?>)">Votar</a>
                                            <?
                                        }
                                    }
                                    ?>
                                </span></td>
                            <td><? echo "R.N. " . $cont . " :  " . $res->cuerpo; ?></td> 
                            <?
                            $cont++;
                            ?>
                        </tr>
                    <? } ?>						

                </table>			
            </div>
            <?
            cerrarConexion($conexion);
            if (isset($accedeUsuario)) {
                ?>

                <?
            }

            if (isset($_SESSION['usuario'])) {// Si existe el usuario logado
                ?>
                <div id=div_formularioRespuesta>
                    <form  id="mi_respuesta" action="./procesado/procesaNuevaRespuesta.php" method="post" onsubmit="return validaRes()">
                        <h3 class="rotulo">Nueva Respuesta Aportada</h3>
                        <textarea name="mi-respuesta" id="mi-respuesta" tabindex="101" rows="5" cols="92" ></textarea>
                        <input type="hidden" name ="idelemento" value="<? echo $idelemento ?>" />
                        <div id="div_botones">
                            <button  id="submit" type="submit" >Publicar Mi Respuesta</button>
                            <button id="reset" type="reset">Limpiar Respuesta</button>
                            <button id="cancelar" type="button" onClick="location.href='./index.php'" />Cancelar</button>

                        </div>
                    </form>
                </div>
            <? } ?>
        </div>
    </div>
</body>

<?
require_once ("./includes/styles/templates/pie.php");
?>