<?php
require $_SERVER['DOCUMENT_ROOT']."/preguntasus/lib/autoloader.php";



// $datos=$_SESSION["datos"];
// $errores = $_SESSION["errores"];
// 
// if(!isset($formulario)){
	// $datos["email"]="";
	// $datos["pass1"]="";
	// $datos["pass2"]="";
	// $datos["nombre"]="";
	// $datos["apellidos"]="";
	// $datos["fechaNacimiento"]="";
// }
// $_SESSION["datos"]=$datos;
$errores=array();
if($_POST["email"]=="" ){
	$errores[]="No se ha indicado el correo electrónico";
	}

	if(count($errores)==0){

	$nuevoUsuario=new UsuarioImpl();
	$usuarioDAO=new UsuarioDAOImpl();

	$nuevoUsuario->__set(
"email", $_POST["email"]);
$nuevoUsuario->__set("password", $_POST["pass1"]);
$nuevoUsuario->__set("nombre", $_POST["nombre"]);
$nuevoUsuario->__set("apellidos", $_POST["apellidos"]);
$nuevoUsuario->__set("fechanacimiento", $_POST["fechaNacimiento"]);

$usuarioDAO->insert($nuevoUsuario);
MySQL::commit();

echo show::mostrar("resultadoCrearUsuario");
}else{
	$datos=array();
	$datos["email"]=$_POST["email"];
	$parametro=array();
	$parametro["errores"]=$errores;
	$parametro["datos"]=$datos;
	echo show("registrarse",$parametro);
}

?>
