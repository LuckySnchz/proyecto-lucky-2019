<?php
require_once("funciones.php");

if ( isset($_SESSION["usuarioLogueado"]) == false ) {
	header("location:login.php");exit;
}
	$usuario = buscarUsuarioPorEmail($_SESSION["usuarioLogueado"]);




	$errores = [];

  $nombreDefaultEdicion= $usuario["nombre"];
  $apellidoDefaultEdicion= $usuario["apellido"];
	$telefonoDefaultEdicion= $usuario["telefono"];
  $avatarDefaultEdicion=$usuario["avatar"];



	if ( $_POST ) {
		$errores = validarEdicionAvatar();

		if ( count($errores) == 0 ) {





$avatar=guardarAvatarEdicion($_FILES["avatarEd"]["name"],$_FILES["avatarEd"]["tmp_name"]);

			$usuario =actualizarUsuarioPorEmailAvatar($_SESSION["usuarioLogueado"],$avatar);

			echo '<div class="alert alert-success" style="text-align:center;font-size:30px;color:"red">EDICIÓN EXITOSA </div>';
			header("Refresh: 1; URL=index.php");exit;}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registración</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset="utf-8">
	<style>
	.navbar {
	  overflow: hidden;
	  background-color: white;
	  font-family: Arial, Helvetica, sans-serif;

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
		border-radius: 20%;
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
<body>
	<ul class="links">
		<?php if (isset($_SESSION["usuarioLogueado"]))  : ?>
	<br>

	<div class="navbar" Style="height:45px;max-width:100%;margin-left:-1%;margin-top:-1%;">
		<div class="uno">
		<div class="dropdown">

			<a href="index.php">Inicio</a>
				<a href="usuarios.php">Usuarios</a>
			<a href="logout.php">Logout</a>
			<div class="dropdown-content">

			</div>
		</div>
	</div>

	<div class="dos">
	<div class="dropdown">
    <strong><a href="miPerfilFoto.php">Foto</a></strong>
		<strong><a href="miPerfilDatos.php">Datos</a></strong>
			<strong><a href="miPerfilContraseña.php">Contraseña</a></strong>

		<div class="dropdown-content">

		</div>
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
	<img src="avatars/<?=$usuario["avatar"]?>" style="width:100px;margin-left: 35%;border-radius:50%"><br><br>



                <div class="row">
                    <div class="col-md-3 register-left">



                    </div>

                            	<form action="miPerfilFoto.php" method="POST" enctype="multipart/form-data">




																														 <div class="form-group" style="display:none">

																																<ul style="color:black;">

																						 <input style="border: 1px solid black;"  class="form-control" placeholder="" value="" name="cp" />

																															 </ul>
																				 </div>






																																									<div class="form-group" id="edicionDeAvatar">
																																										<ul style="color:red">

																																								<?php if (isset($errores["avatarEd"])) : ?>
																																									<input type="file" class="form-control" placeholder="Tu Avatar *" value="" name="avatarEd" style="width:100%;margin-left:-0.5%" />
																																																			<p style="color:red;font-size:8px;">
																																																				<li>
																																																				<?=$errores["avatarEd"]?>
																																																			</li>
																																																			</ul>
																																																			</p>

																																																		<?php else : ?>
																																																			<input type="file" class="form-control" placeholder="Tu Avatar *" value="" name="avatarEd" style="width:100%;margin-left:-0.5%"/>
																																																		 <?php endif; ?>
																																																		 </div>







                                      <input type="submit" class="btnRegister"  value="Guardar" style="width:90%;background-color:grey;margin-left:9%;border-radius:10%"/>
                                      </form>
                                      </div>

                                  </div>




</body>
</html>
