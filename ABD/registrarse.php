<?php
require_once ("./includes/styles/templates/cabecera.php");
require_once ("./includes/widgets/login.php");
require_once ("./includes/widgets/barranavegacion.php");
session_start();
?>

<div id="contenedor_cuerpo">
    <?php
    if(isset($_SESSION["errores"])){
        ?>
    <div class="errores">
        <ul>
        <?php
        foreach($_SESSION["errores"] as $error){
           echo "<li>".$error."</li>"; 
        }
        ?>
        </ul>
    </div>
    <?
    $email=$_SESSION["datos"]["email"];
    $nombre=$_SESSION["datos"]["nombre"];
    $apellidos=$_SESSION["datos"]["apellidos"];
    $fechaNacimiento=$_SESSION["datos"]["fechaNacimiento"];
    
    $_SESSION["errores"]=null;
    $_SESSION["datos"]=null;
    }else{
        $email="";
        $nombre="";
        $apellidos="";
        $fechaNacimiento="";
    }
    ?>
    <form name="datos" method="post" action="./procesado/procesaRegistro.php" onsubmit="return comprobarRegistrarse();">
        <div id="cuadroRegistrarse">
            <div class="campo">
                <div class="labels">
                    <label for="emailUsuario">E-mail:</label>
                </div>
               
                    <input id="emailUsuario" type="text" name="email" value="<?php echo $email;?>"/>

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
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre;?>" />
            </div>
            <div class="campo">
                <div class="labels">
                    <label for="apellidos">Apellidos:</label>

                </div>
                <input type="text" id="apellidos" name="apellidos"  value="<?php echo $apellidos;?>"/>
            </div>
            <div class="campo">
                <div class="labels">
                    <label for="fechaNacimiento">Fecha de nacimiento:</label>
                </div>
                <input type="text" id="fechaNacimiento" name="fechaNacimiento"  value="<?php echo $fechaNacimiento;?>"/>
            </div>
            <div id="botonRegistrarse">
                <input id="submit" type="submit" value="Registrarse"/>
            </div>
        </div>
    </form>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>