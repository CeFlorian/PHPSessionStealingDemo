<?php
session_start();
$conexion = mysqli_connect("db-app", "user", "user", "bd_app");
mysqli_set_charset($conexion, 'utf8');
$conexion->query("SET time_zone = 'America/Guatemala'");
if (!$conexion) {
	header("Location: login.php?error=Conexión fallida con la base de datos");
}

#Salir si sesión no está iniciada
if (!isset($_SESSION["usuario"])) {
	header("Location: logout.php");
}

$mensaje = $_POST["mensaje"];
$usuario = $_SESSION["usuario"];

//INSERTAR EN LA BASE DE DATOS
$conexion->autocommit(false);
try {
	$res = $conexion->query("INSERT INTO `tb_mensajes`(`mensaje`, `usuario`) VALUES ('".$mensaje."','".$usuario."')");
	if ($res) {
		$conexion->commit();
		header("Location: index.php");
	} else {
		$conexion->rollback();
		header("Location: index.php?error=Fallo al insertar el registro en la bd");
	}
} catch (Exception $e) {
	$conexion->rollback();
	header("Location: index.php?error=Hubo un error insertar el registro en la bd");
}
mysqli_close($conexion);


// if (!file_exists("mensajes.txt")) {
// 	touch("mensajes.txt");
// }
// file_put_contents("mensajes.txt", "[" . $usuario . "]: " . $mensaje . PHP_EOL . PHP_EOL, FILE_APPEND);
// header("Location: index.php");
