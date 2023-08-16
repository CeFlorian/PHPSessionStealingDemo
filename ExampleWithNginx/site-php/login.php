<?php
$usuario = $_POST["usuario"];
$pass = $_POST["password"];

#Simple y tonta comprobación para efectos de simplicidad
session_start();
if($usuario === "admin" && $pass === "0UqiNBK8iQRrtK1yvHosV79h3"){
	$_SESSION["admin"] = true;
	$_SESSION["usuario"] = $usuario;
	header("Location: index.php");
}else if($usuario === "user" && $pass === "4PPvLoH19Jvbhig3rebUZnD63"){
	$_SESSION["admin"] = false;
	$_SESSION["usuario"] = $usuario;
	header("Location: index.php");
}else{
	echo "No es válido";
}
?>