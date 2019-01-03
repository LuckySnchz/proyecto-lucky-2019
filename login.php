<?php

	require_once("funciones.php");
	$errores = [];
	$emailDefault = "";

	if ( isset($_SESSION["usuarioLogueado"]) ) {
		header("location:index.php");exit;
	}

	if ( $_POST ) {

		$errores = validarLogin();

		if (count($errores) == 0) {
			$_SESSION["usuarioLogueado"] = $_POST["email"];

			if ( isset($_POST["recordame"]) ) {
				setcookie("usuarioLogueado", $_POST["email"], time() + 60 * 60 * 24 * 30);
			}

			header("location:index.php");exit;
		}

		$emailDefault = $_POST["email"];

	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset="utf-8">
	<style>
	body{background: url(images/bg-body.png);font-family: 'Raleway', sans-serif;}</style>
</head>
<body>
<?php include("header.php"); ?>
	<div class="contenedor" style="margin-left:15%;width:100%">
			<h2 style="margin-left:26%">Logueate</h2><br>
                <div class="row">
                    <div class="col-md-3 register-left">



                    </div>

                            	<form action="login.php" method="POST">

																<div class="form-group">
																 <ul style="color:red;">
																 <?php if (isset($errores["email"])) : ?>
																	 <input style="border: 1px solid red;" type="text" class="form-control" placeholder="Email*" value="" name="email" style="width:100%;margin-left:-20%"/>
																											 <p style="color:red;font-size:8px;">
																												 <li>
																												 <?=$errores["email"]?>
																											 </li>
																											 </p>
																										 <?php else : ?>
																											 <input type="text" class="form-control" placeholder="Email*" value="<?=$emailDefault?>" name="email" style="width:100%;margin-left:-20%"/>
																										 <?php endif; ?>
																									 </ul>
																									 </div>

                               <div class="form-group">
																				<label class="checkbox-inline" name="recordame">
       <input type="checkbox" value="">Recordame
     </label>

																					</div>



	                                        <div class="form-group">
	                                        	<?php if (isset($errores["password"])) : ?>
													<input style="border: 1px solid red;" type="password" class="form-control" placeholder="Contasenia *" value="" name="password" style="width:85%;margin-left:-1%" />
	                                        		<p style="color:red;font-size:8px;">
	                                        			<?=$errores["password"]?>
	                                        		</p>
	                                        	<?php else : ?>
	                                        		<input type="password" class="form-control" placeholder="Contrasenia *" value="" name="password"style="width:85%;margin-left:-1%"/>
	                                        	<?php endif; ?>
											</div>


	                                        <input type="submit" class="btnRegister" style="width:85%;background-color:grey;border-radius:10%"  value="Login"/>

	                            </form>
                            </div>



</body>
</html>
