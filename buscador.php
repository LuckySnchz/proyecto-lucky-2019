<?php
	require_once("funciones.php");


	if ( $_GET ) {
		$errores = validarBusqueda();

		$genero = null;
			if (isset($_GET["genero"])) {
				$genero = $_GET["genero"];
			}

			if ($_GET["edadDesde"] != "") {
				$edadDesde = $_GET["edadDesde"];
			}


			if ($_GET["edadHasta"] != "") {
				$edadHasta = $_GET["edadHasta"];
			}

			$fechaDesde = null;
			if ($_GET["edadHasta"] != "") {
				$edadHasta=(int)$edadHasta;
				$año_actual = date("Y");
				$año_actual=(int) $año_actual;


				$año_nacimiento_hasta=$año_actual-$edadHasta;
				$año_nacimiento_hasta = (int) $año_nacimiento_hasta;
				$fechaDesde=$año_nacimiento_hasta."/01/01";
				$fechaDesde=(string)$fechaDesde;

				}
		$fechaHasta = null;
			if ($_GET["edadDesde"] != ""){
				$edadDesde=(int)$edadDesde;
				$año_actual = date("Y");
				$año_actual=(int)$año_actual;


				$año_nacimiento_desde=$año_actual-$edadDesde;
				$año_nacimiento_desde = (int) $año_nacimiento_desde;
				$fechaHasta=$año_nacimiento_desde."/12/31";
				$fechaHasta=(string)$fechaHasta;
			}



		if ( count($errores) == 0 ) {

	$usuarios = buscadorUsuarios($_GET["buscador"], $genero, $fechaDesde, $fechaHasta);



}}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buscador</title>
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
		<div class="dropdown">

			<a href="index.php">Inicio</a>
				<a href="usuarios.php">Usuarios</a>
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

<div class="contenedor" style="margin-left:30%">


			<ul>
		<?php if (isset($usuarios)): ?>
			<?php foreach ($usuarios as $usuario) : ?>
			<li>
				<a href="detalleUsuario.php?idUsuario=<?=$usuario["id"]?>">
				<img src="avatars/<?=$usuario["avatar"]?>" style="width:60px;margin-left: 2%;margin-right: 1%;margin-bottom: 1%;border-radius:50%">	<?=$usuario["nombre"]?> <?=$usuario["apellido"]?>
					</a>
        <?php if (substr($usuario["nacimiento"], 5, 2)>date("m")) : ?>
					<strong>(<?=$edad=-substr($usuario["nacimiento"], 0, 4)+date("Y")-1;?>)<?=$usuario["ciudad"]?></strong>
				<?php else : ?>
				<strong>(<?=$edad=-substr($usuario["nacimiento"], 0, 4)+date("Y");?>)	<?=$usuario["ciudad"]?></strong>
					<?php endif; ?>

				<br>
				</li>






			</li>
		<?php endforeach;?>
	<?php endif;?>
		</ul>
	<?php  ?>



	<strong><label>Buscar por Nombre, por Apellido o por Email:</label></strong> <br>	<br>
	<form action="buscador.php" method="GET">
		<div class="form-group">
		 <ul style="color:red; ">
	<?php if (isset($errores["buscador"])) : ?>
		<input style="border: 1px solid red; width:40%;margin-left:-4%" type="text" class="form-control" placeholder="Primer Nombre *" value="" name="buscador" />
												<p style="color:red;font-size:8px;">
													<li>
													<?=$errores["buscador"]?>
												</li>
												</ul>
												</p>

											<?php else : ?>
												<input style="border: 1px solid red; width:40%;margin-left:-4%" type="text" class="form-control" placeholder="Primer Nombre *" value="" name="buscador" />
											 <?php endif; ?>
</div>





<div style="overflow:hidden;width:27%">
			<strong><label>Filtrar por Género:</label></strong> <br>
			<div style="float:left">
			<label>	<input type="radio" name="genero" value="f" >
			<span>Femenino </span>	</label><br><label ></div>

			<div style="float:right;margin-left:5%">
			<label><input type="radio" name="genero" value="o">
			<span>Otro</span>	</label><br></label ></div>

			<div style="float:right;margin-left:5%">
			<label><input type="radio" name="genero" value="m">
				<span>Masculino </span>	</label><br><br></div>
		</div>
		<div style="overflow:hidden;width:37%">
		<strong>	<label>Buscar por rango de Edad:</label></strong><br><br>
		<strong>	<label>Desde:</label></strong>
<input type="text" name="edadDesde" style="width:10%;border-radius:10%">

<div style="float:right">

 <strong>	<label>Hasta:</label></strong>
 <input type="text" name="edadHasta" style="width:16%;border-radius:10%"></div><br><br>




        <input type="submit" style="width:100%;border-radius:5%" name="" value="Buscar">
	</form>
</div>
</body>
</html>
