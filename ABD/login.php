<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
session_start();
$erroresBuscarPreguntas = $_SESSION["erroresBuscarPregunta"];
?>
<div id="contenedor_cuerpo">

    <div id="erroresBuscarPregunta" class="errores">
        <?php
        if (isset($erroresBuscarPreguntas)) {
            foreach ($erroresBuscarPreguntas as $error) {
                print("<div class='error'>");
                print("$error");
                print("</div>");
            }
        }
        ?>
    </div>

    <div id="recuadroLogin" class="recuadroLogin">
        <form id="formLogin" name="formLogin" method="post" action="./procesado/login.php" onsubmit="return camposVacios();">
            <div id="emailLogin">
                <div class="labelRecuadroLogin">
                    <label class="labelRecuadroLoginEmail">Email:</label>
                </div>
                <div class="inputRecuadroLogin">
                    <input type="text" id="email" name="email" />
                </div>
            </div>
            <div id="passLogin">
                <div class="labelRecuadroLogin">
                    <label class="labelRecuadroLoginEmail">Contraseña:</label>
                </div>
                <div class="inputRecuadroLogin">
                    <input type="password" id="pass" name="pass" />
                </div>
            </div>	
            <div id="botonLogin">
                <input type="submit" value="Entrar"/>
            </div>
        </form>
    </div>
</div>

<?php
require_once ("./includes/styles/templates/pie.php");
?>