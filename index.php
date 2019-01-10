
<?php
require_once("funciones.php");


if (!isset($_SESSION["usuarioLogueado"]) ) {
	header("location:login.php");exit;
} ?>
<script type="text/javascript">
	var click=1;
function mostrarcaja(){

	if(click==1){
		var contenedor = document.getElementById("caja");
			contenedor.style.display = "block";
			click=click+1;

		}
	else{var contenedor = document.getElementById("caja");
		contenedor.style.display = "none";
	click=1;}
}
	</script>


<?php


function calcularColor($imagenPublic) {
	if ($imagenPublic=="ofertas.png") {
		$color = "red";
	} elseif ($imagenPublic=="compras.png") {
		$color = "#33cc33";
	} else {
		$color = "#0066ff";
	}

	return $color;
}





$articulo1 = [
	"id" => 1,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"ofertas.png",
	"precio" =>  99.90
];
$articulo1["color"] = calcularColor($articulo1["imagenPublic"]);

$articulo2 = [
	"id" => 2,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"ofertas.png",
	"precio" => 97
];
$articulo2["color"] = calcularColor($articulo2["imagenPublic"]);

$articulo3 = [
	"id" => 3,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"ofertas.png",
	"precio" => 495
];
$articulo3["color"] = calcularColor($articulo3["imagenPublic"]);
$articulo4 = [
	"id" => 4,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"compras.png",
	"precio" =>  99.90
];
$articulo4["color"] = calcularColor($articulo4["imagenPublic"]);
$articulo5 = [
	"id" => 5,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"compras.png",
	"precio" => 97
];
$articulo5["color"] = calcularColor($articulo5["imagenPublic"]);
$articulo6 = [
	"id" => 6,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"compras.png",
	"precio" => 495
];
$articulo6["color"] = calcularColor($articulo6["imagenPublic"]);
$articulo7 = [
	"id" => 7,
	"nombre" => "Dermaglos ",
	"descripcion" => "<br>Dermaglos <br>Spray<br> FPS 30",
	"imagen" => "dermaglos.png",
	"imagenPublic"=>"consultas.png",
	"precio" =>  99.90
];

$articulo7["color"] = calcularColor($articulo7["imagenPublic"]);






$articulos = [
	$articulo1, $articulo2, $articulo3, $articulo4, $articulo5, $articulo6, $articulo7
];







 ?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/styles.css" rel="stylesheet">
		  <link rel="stylesheet" href="ionicons/css/ionicons.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	</style>



		<title>Wathsfarma</title>
	</head>
	<header>

		<div class="btn-group" style="width:36%;height: 8vh;font-size:18px;margin-left:1%;margin-bottom:-0.5%;margin-top:-1%">
			<button class="btn btn-primary btn-sm dropdown-toggle"type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#e0e0d1;color:black">
				CATEGORIAS
			</button>
			<div class="dropdown-menu" style="padding:8.5%;margin-top:2%"  style="width:43%;height: 10vh;margin-top:2%">
<a  href="#">Protectore Solares</a><br>
<a  href="asepxia.php">Asepxia</a><br>
<a  href="cicatricure.php">Cicatricure</a><br>






			 </div>

			</div>



		<div class="navbar" Style="height:45px;max-width:100%;margin-left:1%;margin-top:-2%;overflow:hidden">
			<div class="uno" style="float:left">
			<div class="dropdown">

				<a href="index.php">Inicio</a>
					<a href="usuarios.php">Usuarios</a>
				<a href="logout.php">Logout</a>
				<div class="dropdown-content">
	</div>
				</div>
			</div>
			<div class="dos" style="float:right">
			<div class="dropdown">
		 <strong><a href="miPerfil.php">Mi Perfil</a></strong>
			<strong>	<a href="miPerfilFoto.php">Foto</a></strong>
			<strong>		<a href="miPerfilContraseña.php">Contraseña</a></strong>

				<div class="dropdown-content">

				</div>
			</div>
			</div>

		</div>


		<ul class="links" style="margin-left:37%;font-size:40px;margin-bottom:-3%">

		<li>
			Hola <?=buscarUsuarioPorEmail($_SESSION["usuarioLogueado"])["nombre"]?>
		</li>

</ul>


</header>
	<body>

  <form class="" action="index.php" method="POST">
<div class="columnas">


<div class="container">

					<?php for ($i = 0; $i < count($articulos); $i++) { ?>

										<div class="card">
											<div class="card-image">
					<img src="images/<?=$articulos[$i]["imagen"]?>">
				</div>
				<div class="card-data">
				<img class="special" src="images/<?=$articulos[$i]["imagenPublic"]?>">
				<br>
	<p><strong><?=$articulos[$i]["nombre"]?><br><?=$articulos[$i]["descripcion"]?></strong> </p>

	<p style="font-weight:bold;color:<?=$articulos[$i]["color"]?>">
		Precio: <?=$articulos[$i]["precio"]?>

	</p>

<select id="cantidad" name="<?=$articulos[$i]["id"]?>" style="width:40px; border-radius:20%" onChange="selectOnChange<?=$articulos[$i]["id"]?>(this)">
<option value=""></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>

				</div>
			</div>
			<?php } ?>

<button  class="btn btn-secondary"type="submit"  id="guardar" style="padding-left:3%;font-size:1.2em">Guardar </button><br>
</form>

</div>
<div class="listado" style="background-color:white;width:100%;height:20vh;text-align:center">
	<h4><strong>Productos Seleccionados</strong></h4>
			<ul>


				<?php

				 foreach ($_POST as $valor=>$cant) : ?>

			<?php if ($cant!=0) : ?>
			<li>
				<strong><?=$cant?></strong>
					<?=$articulos[$valor-1]["nombre"]?>

				<strong>  <?=$articulos[$valor-1]["precio"]*$cant?></strong>


				</li>
	<?php endif;?>

				 <?php if ($cant=0) : ?>
				 <?php return null;?>
						<?php endif;?>


				<?php endforeach;?>


			</ul>



<a name="fin"></a>
</div>
</body>
</html>
