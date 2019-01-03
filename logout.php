<?php

session_start();
session_destroy();
setcookie("usuarioLogueado", "", -1);
header("location:login.php");exit;

?>
