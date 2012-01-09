<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/funciones/fechas.php" );
?>

<div id="contenedor_cuerpo">
    <?php
    if (isset($_SESSION["errores"])) {
        ?>
        <div class="errores">
            <ul>
                <?php
                foreach ($_SESSION["errores"] as $error) {
                    echo "<li>" . $error . "</li>";
                }
                ?>
            </ul>
        </div>
        <?
        $email = $_SESSION["datos"]["email"];
        $nombre = $_SESSION["datos"]["nombre"];
        $apellidos = $_SESSION["datos"]["apellidos"];
        $fechaNacimiento = $_SESSION["datos"]["fechaNacimiento"];

        $_SESSION["errores"] = null;
        $_SESSION["datos"] = null;
    } else {
        $usuarioLogueado = $usuario;
        $email = $usuarioLogueado->email;
        $nombre = $usuarioLogueado->nombre;
        $apellidos = $usuarioLogueado->apellidos;
        $fechaNacimiento = mysql2fecha($usuarioLogueado->fechanacimiento);
    }
    ?>
    <form name="datos" method="post" action="./procesado/modificarPerfil.php" onsubmit="return comprobarRegistrarse();">
        <div id="cuadroRegistrarse">
            <div class="campo">
                <div class="labels">
                    <p>Foto de perfil:</p>
                </div>

                <img src="/abd/muestraFoto.php?id=<? echo $usuario->id;?>&tam=150" /> 

            </div>
            <?php
            include_once './includes/styles/templates/formularioUsuario.php';
            ?>
            <div id="botonRegistrarse">
                <input id="submit" type="submit" name="submit" value="Editar perfil"/>
            </div>
        </div>
    </form>
    <div id="avisos">
        <p>Si no se quiere cambiar la contraseña o la foto de perfil hay que dejar el campo en blanco</p>
    </div>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>
