<?php
session_start();

#Salir si sesión no está iniciada
if(!isset($_SESSION["usuario"])){
	header("Location: logout.php");
}
#Recuperar los mensajes de un archivo
$mensajes = [];
if(file_exists("mensajes.txt")){
	$mensajes = explode("\n", file_get_contents("mensajes.txt"));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
</head>
<body>
	<h1>Hola <?php echo $_SESSION["usuario"]; ?></h1>
	<a href="logout.php">Cerrar sesión</a>
	<a href="nuevo.html">Agregar mensaje</a>
	<h3>Mensajes del día:</h3>
	<?php foreach ($mensajes as $mensaje) {
		echo $mensaje . "<br>";
	} ?>
</body>
</html>