<?php
require $_SERVER['DOCUMENT_ROOT']."/preguntasus/lib/autoloader.php";

$nuevoUsuario=new UsuarioImpl();
$usuarioDAO=new UsuarioDAOImpl();

$nuevoUsuario->__set("email", $_POST["email"]);
$nuevoUsuario->__set("password", $_POST["pass1"]);
$nuevoUsuario->__set("nombre", $_POST["nombre"]);
$nuevoUsuario->__set("apellidos", $_POST["apellidos"]);
$nuevoUsuario->__set("fechanacimiento", $_POST["fechaNacimiento"]);

$usuarioDAO->insert($nuevoUsuario);
MySQL::commit();

?>
