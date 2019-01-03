<?php

$dsn = 'mysql:host=localhost;dbname=whatsfarma';
$usuario = "root";
$pass = "";

try {
	$db = new PDO($dsn, $usuario, $pass);
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
 	echo "Error!";exit;
}
?>
