<?php

require_once("funciones.php");
$usuario=buscarUsuarioPorId($_GET["idUsuario"]);
if($usuario["genero"]=="f"){$usuario["genero"]="Femenino";}
if($usuario["genero"]=="m"){$usuario["genero"]="Masculino";}
if($usuario["genero"]=="o"){$usuario["genero"]="Otro";}
$año_nacimiento=substr($usuario["nacimiento"], 0, 4);  // edad
$año_nacimiento = (int) $año_nacimiento;
$año_actual = date("Y");
$año_actual=(int) $año_actual;
$edad=$año_actual-$año_nacimiento;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	.navbar {
	  overflow: hidden;
	  background-color: white;
	  font-family: Arial, Helvetica, sans-serif;
		width: 100%;

	}

	.navbar a {
	  float: left;
	  font-size: 16px;
	  color: black;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}

	.dropdown {
	  float: left;
	  overflow: hidden;
	}

	.dropdown .dropbtn {
	  font-size: 16px;
	  border: none;
	  outline: none;
	  color: black;
	  padding: 14px 16px;
	  background-color: inherit;
	  font-family: inherit;
	  margin: 0;
	}

	.navbar a:hover, .dropdown:hover .dropbtn {
	  background-color: #e0e0d1;
		border-radius: 10%;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  float: none;
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	}

	.nav a:hover {
	  background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
	  display: block;
	}

	body{background: url(images/bg-body.png);font-family: 'Raleway', sans-serif;}
	</style>




	</head>
</head>
<body>
	<ul class="links">
		<?php if (isset($_SESSION["usuarioLogueado"]))  : ?>
	<br>

	<div class="navbar" Style="max-width:100%;margin-left:-1%;margin-top:-1%">
		<div class="dropdown">

			<a href="index.php">Inicio</a>
			<a href="miPerfil.php">Mi Perfil</a>
			<a href="logout.php">Logout</a>
			<div class="dropdown-content">

			</div>
		</div>


	</div>



		<?php else: ?>
			<ul class="nav nav-tabs"style="margin-bottom:5%;margin-top:1%">
						<li class="nav-item active"style="margin-right:0.1%" > <a class="nav-link active" href="registracion.php">Registracion</a> </li>
						<li class="nav-item active" > <a class="nav-link active" href="login.php">Login</a> </li>

					</ul>
		<?php endif; ?>
	</ul>
	<div class="contenedor" style="margin-left:5%">



	                <div class="row">
	                    <div class="col-md-3 register-left">



	                    </div><br><br>
											<!DOCTYPE html>
											<html>
											<head>
												<title></title>
											</head>
											<body>
<div class="ficha" style="margin-left:35%">
<img src="avatars/<?=$usuario["avatar"]?>" style="width:100px;margin-left: 5%;border-radius:50%"><br><br>
                    <strong><label>Nombre:</label></strong>
												<?=$usuario["nombre"]?><br><br>
												    <strong><label>Apellido:</label></strong>
												<?=$usuario["apellido"]?><br><br>
											    <strong>	<label>email:</label></strong>
												<?=$usuario["email"]?><br><br>
											    <strong>	<label>Teléfono:</label></strong>
												<?=$usuario["telefono"]?><br><br>
											    <strong>	<label>Género:</label></strong>
													<?=$usuario["genero"]?><br><br>

											    <strong>	<label>Fecha de nacimiento:</label></strong>
												<?=$usuario["nacimiento"]?><br><br>

												<strong>	<label>Edad:</label></strong>
												<?php if (substr($usuario["nacimiento"], 5, 2)>date("m")) : ?>
													<strong>(<?=$edad=-substr($usuario["nacimiento"], 0, 4)+date("Y")-1;?>)</strong>
												<?php else : ?>
												<strong>(<?=$edad=-substr($usuario["nacimiento"], 0, 4)+date("Y");?>)</strong>
													<?php endif; ?>

										<br><br>





</div>














</body>
</html>
