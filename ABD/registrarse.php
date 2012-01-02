<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
?>

<div id="contenedor_cuerpo">
    <form name="datos" method="post" action="../modulos/procesaRegistro.php">
        <div id="cuadroRegistrarse">
            <div class="campo">
                <div class="labels">
                    <label for="email">E-mail:</label>
                </div>
               
                    <input id="email" type="text" name="email" />

            </div>
            <div class="campo">
                <div class="labels">
                    <label for="pass1">Contraseña:</label>
                </div>
                <input id="pass1" type="password" name="pass1" />
            </div>
            <div class="campo">
                <div class="labels">
                    <label for="pass2">Verifique contraseña:</label>
                </div>
                <input id="pass2" type="password" name="pass2" />
            </div>
            <div class="campo">
                <div class="labels">
                    <label for="nombre">Nombre:</label>
                </div>
                <input type="text" id="nombre" name="nombre" />
            </div>
            <div class="campo">
                <div class="labels">
                    <label for="apellidos">Apellidos:</label>

                </div>
                <input type="text" id="apellidos" name="apellidos" />
            </div>
            <div class="campo">
                <div class="labels">
                    <label for="fechaNacimiento">Fecha de nacimiento:</label>
                </div>
                <input type="text" id="fechaNacimiento" name="fechaNacimiento" />
            </div>
            <div id="botonRegistrarse">
                <input type="submit" value="Enviar"/>
            </div>
        </div>
    </form>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>