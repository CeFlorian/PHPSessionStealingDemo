<?php
session_start();
session_regenerate_id(true);

#Salir si sesión no está iniciada
if(!isset($_SESSION["usuario"])){
	header("Location: logout.php");
}

$mensaje = $_POST["mensaje"];
$usuario = $_SESSION["usuario"];

#Crear si no existe
if(!file_exists("mensajes.txt")){
	touch("mensajes.txt");
}
file_put_contents("mensajes.txt", "[" . $usuario . "]: " . $mensaje . PHP_EOL . PHP_EOL, FILE_APPEND);
header("Location: index.php");
?>