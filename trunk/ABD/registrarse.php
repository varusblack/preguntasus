<?php
require_once ("./includes/styles/templates/cabecera.php");

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
            <?php
                include_once './includes/styles/templates/formularioUsuario.php';
            ?>
            <div id="botonRegistrarse">
                <input id="submit" type="submit" value="Registrarse"/>
            </div>
        </div>
    </form>
</div>
<?php
require_once ("./includes/styles/templates/pie.php");
?>