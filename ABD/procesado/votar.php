<?php
require_once ($_SERVER["DOCUMENT_ROOT"]. "/abd/entidades/Elemento.php");
require_once ($_SERVER["DOCUMENT_ROOT"]. "/abd/accesosBD/conexionesBD.php");
require_once ($_SERVER["DOCUMENT_ROOT"]. "/abd/accesosBD/accesosElemento.php");
require_once ($_SERVER["DOCUMENT_ROOT"]. "/abd/entidades/Usuario.php");
require_once ($_SERVER["DOCUMENT_ROOT"]. "/abd/accesosBD/accesosUsuario.php");
require_once ($_SERVER["DOCUMENT_ROOT"]. "/abd/accesosBD/accesosVotacion.php");

$conexion=crearConexion();
$idusuario=$_POST["usuario"];
$idelemento=$_POST["elemento"];
insertarVotacion($idelemento,$idusuario, $conexion);
$elemento=encontrarElementoPorId($_POST["elemento"], $conexion);

$usuarioVotado=obtenerUsuarioPorId($elemento->idautor, $conexion);
incrementaPuntosUsuario($usuarioVotado, $conexion);

echo obtenerNumeroDeVotosDeElemento($elemento, $conexion);
echo "|";
echo $elemento->id;

        
cerrarConexion($conexion);


?>
