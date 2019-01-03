<?php

	require_once("funciones.php");

	if ( isset($_SESSION["usuarioLogueado"]) ) {
		header("location:login.php");exit;
	}

	$errores = [];

	$nombreDefault = "";
	$apellidoDefault = "";
	$emailDefault = "";
	$telefonoDefault = "";
	$respuestaSeguridadDefault = "";
	$nacimientoDefault = "";
  $ciudadDefault="";
	if ( $_POST ) {
		$errores = validarRegistracion();

		if ( count($errores) == 0 ) {

			$usuario = armarUsuario();

			guardarUsuario($usuario);

			guardarAvatar($usuario);

			header("location:index.php");exit;
		}

		$nombreDefault = $_POST["nombre"];
		$apellidoDefault = $_POST["apellido"];
		$emailDefault = $_POST["email"];
		$telefonoDefault = $_POST["telefono"];
		$respuestaSeguridadDefault = $_POST["respuesta-seguridad"];
		$nacimientoDefault = $_POST["nacimiento"];
		$ciudadDefault = $_POST["ciudad"];
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
	body{background: url(images/bg-body.png);font-family: 'Raleway', sans-serif;}</style>
</head>
<body>
	<?php include("header.php"); ?>
<div class="contenedor" style="margin-left:5%">
	<h2 style="margin-left:36%">Registrate</h2><br>



                <div class="row">
                    <div class="col-md-3 register-left">



                    </div>

                            	<form action="registracion.php" method="POST" enctype="multipart/form-data">

                         <div class="form-group">
													 <ul style="color:red; ">
												<?php if (isset($errores["nombre"])) : ?>
													<input style="border: 1px solid red;" type="text" class="form-control" placeholder="Primer Nombre *" value="" name="nombre" />
	                                        		<p style="color:red;font-size:8px;">
																								<li>
	                                        			<?=$errores["nombre"]?>
																							</li>
																							</ul>
	                                        		</p>

	                                        	<?php else : ?>
	                                        		<input type="text" class="form-control" placeholder="Primer Nombre *" value="<?=$nombreDefault?>" name="nombre" />
                                            <?php endif; ?>

	                                        </div>
                                          <div class="form-group">
																					<ul style="color:red; ">
																					<?php if (isset($errores["apellido"])) : ?>
																						<input style="border: 1px solid red;" type="text" class="form-control" placeholder="Apellido *" value="" name="apellido" />
																																<p style="color:red;font-size:8px;">
																																	<li>
																																	<?=$errores["apellido"]?>
																																</li>
																																</ul>
																																</p>
																															<?php else : ?>
																																<input type="text" class="form-control" placeholder="Apellido *" value="<?=$apellidoDefault?>" name="apellido" />
																															<?php endif; ?>

																														</div>

	                                        <div class="form-group">
																						 <ul style="color:red; ">
	                                        	<?php if (isset($errores["password"])) : ?>
													<input style="border: 1px solid red;" type="password" class="form-control" placeholder="Contasenia *" value="" name="password" />
	                                        		<p style="color:red;font-size:8px;">
	                                        			<li><?=$errores["password"]?></li>
	                                        		</p>
	                                        	<?php else : ?>
	                                        		<input type="password" class="form-control" placeholder="Contrasenia *" value="" name="password" />
	                                        	<?php endif; ?>
																						</ul>
											</div>

											<div class="form-group">
												 <ul style="color:red; ">
												<?php if (isset($errores["cpassword"])) : ?>
			<input style="border: 1px solid red;" type="password" class="form-control" placeholder="Confirmar Contasenia *" value="" name="cpassword" />
													<p style="color:red;font-size:8px;">
														<li><?=$errores["cpassword"]?></li>
													</p>
												<?php else : ?>
													<input type="password" class="form-control" placeholder="Confirmar Contasenia *" value="" name="cpassword" />
												<?php endif; ?>
												</ul>
	</div>




	                                        <div class="form-group">

											 	<div class="maxl">
													<ul >
													<?php if (isset($errores["genero"])) : ?>
														<li style="color:red; ">
														<?=$errores["genero"]?>
													</li>


	                                                <label class="radio inline">
	                                                	<?php if (isset($_POST["genero"]) && $_POST["genero"] == "m") : ?>
															<input type="radio" name="genero" value="m" checked>
														<?php else : ?>
															<input type="radio" name="genero" value="m">
														<?php endif; ?>
	                                                    <span> Masculino </span>
	                                                </label>
	                                                <label class="radio inline">
														<?php if (isset($_POST["genero"]) && $_POST["genero"] == "f") : ?>
															<input type="radio" name="genero" value="f" checked>
														<?php else : ?>
															<input type="radio" name="genero" value="f">
														<?php endif; ?>
	                                                    <span>Femenino </span>
	                                                </label>
	                                                <label class="radio inline">
														<?php if (isset($_POST["genero"]) && $_POST["genero"] == "o") : ?>
															<input type="radio" name="genero" value="o" checked>
														<?php else : ?>
															<input type="radio" name="genero" value="o">
														<?php endif; ?>
	                                                    <span>Otro </span>
	                                                </label>

                                  </ul>

                                 	<?php else : ?>
																							<label class="radio inline">
																								<?php if (isset($_POST["genero"]) && $_POST["genero"] == "m") : ?>
													<input type="radio" name="genero" value="m" checked>
												<?php else : ?>
													<input type="radio" name="genero" value="m">
												<?php endif; ?>
																									<span> Masculino </span>
																							</label>
																							<label class="radio inline">
												<?php if (isset($_POST["genero"]) && $_POST["genero"] == "f") : ?>
													<input type="radio" name="genero" value="f" checked>
												<?php else : ?>
													<input type="radio" name="genero" value="f">
												<?php endif; ?>
																									<span>Femenino </span>
																							</label>
																							<label class="radio inline">
												<?php if (isset($_POST["genero"]) && $_POST["genero"] == "o") : ?>
													<input type="radio" name="genero" value="o" checked>
												<?php else : ?>
													<input type="radio" name="genero" value="o">
												<?php endif; ?>
																									<span>Otro </span>
																							</label>
																						<?php endif; ?>

																						<div class="form-group">
									 													 <ul style="color:red; ">
									 												<?php if (isset($errores["avatar"])) : ?>
									 													<input type="file" class="form-control" placeholder="Tu Avatar *" value="" name="avatar" style="width:110%;margin-left:-10%" />
									 	                                        		<p style="color:red;font-size:8px;">
									 																								<li>
									 	                                        			<?=$errores["avatar"]?>
									 																							</li>
									 																							</ul>
									 	                                        		</p>

									 	                                        	<?php else : ?>
									 	                                        		<input type="file" class="form-control" placeholder="Tu Avatar *" value="" name="avatar" style="width:110%;margin-left:-10%"/>
									                                             <?php endif; ?>

									 	                                        </div>






	                                            </div>
																						</div>
                                             <div class="form-group">
																							<ul style="color:red; ">
																							<?php if (isset($errores["email"])) : ?>
																								<input style="border: 1px solid red;" type="text" class="form-control" placeholder="Email*" value="" name="email" />
																																		<p style="color:red;font-size:8px;">
																																			<li>
																																			<?=$errores["email"]?>
																																		</li>
																																		</p>
																																	<?php else : ?>
																																		<input type="text" class="form-control" placeholder="Email*" value="<?=$emailDefault?>" name="email" />
																																	<?php endif; ?>
																																</ul>
																																</div>


																																<div class="form-group">
																																 <ul style="color:red; ">
																																 <?php if (isset($errores["ciudad"])) : ?>
																																	 <input style="border: 1px solid red;" type="text" class="form-control" placeholder="Ciudad*" value="" name="ciudad" />
																																											 <p style="color:red;font-size:8px;">
																																												 <li>
																																												 <?=$errores["ciudad"]?>
																																											 </li>
																																											 </p>
																																										 <?php else : ?>
																																											 <input type="text" class="form-control" placeholder="Ciudad*" value="<?=$ciudadDefault?>" name="ciudad" />
																																										 <?php endif; ?>
																																									 </ul>
																																									 </div>

















                                                                <div class="form-group">
																																<ul style="color:red; ">
																																<?php if (isset($errores["telefono"])) : ?>
																																	<input style="border: 1px solid red;" type="text" class="form-control" placeholder="Telefono*" value="" name="telefono" />
																																											<p style="color:red;font-size:8px;">
																																												<li>
																																												<?=$errores["telefono"]?>
																																											</li>
																																											</p>
																																										<?php else : ?>
																																											<input type="text" class="form-control" placeholder="Telefono*" value="<?=$telefonoDefault?>" name="telefono" />
																																										<?php endif; ?>
																																									</ul>
																																									</div>
																																									<div class="form-group">
																																									<ul style="color:red; ">
																																									<?php if (isset($errores["pregunta-seguridad"])) : ?>
																																										<input style="border: 1px solid red;" type="text" class="form-control" placeholder="Pregunta de Seguridad*" value="" name="pregunta-seguridad" />
																																																				<p style="color:red;font-size:8px;">
																																																					<li>
																																																					<?=$errores["pregunta-seguridad"]?>
																																																				</li>

																																																				</p>
																																																			</ul>
																																																			<?php endif; ?>

																																																			<select class="form-control" name="pregunta-seguridad">
																																																				<option value="" selected >¿Pregunta de Seguridad ?</option>
 																											 																								<?php if (isset($_POST["pregunta-seguridad"]) && $_POST["pregunta-seguridad"] == "0") : ?>
 																											 													<option value="0" selected >¿Cuándo es tu cumpleaños ?</option>
 																											 												<?php else : ?>
 																											 														<option value="0" >¿Cuándo es tu cumpleaños ?</option>
 																											 												<?php endif; ?>
																																							<?php if (isset($_POST["pregunta-seguridad"]) && $_POST["pregunta-seguridad"] == "1") : ?>
																												<option value="1" selected >¿Cuál es tu teléfono de la infancia?</option>
																											<?php else : ?>
																													<option value="1" >¿Cuál es tu teléfono de la infancia?</option>
																											<?php endif; ?>
																											<?php if (isset($_POST["pregunta-seguridad"]) && $_POST["pregunta-seguridad"] == "2") : ?>
																<option value="2" selected >¿Cómo se llama tu primer mascota?</option>
															<?php else : ?>
																	<option value="2" >¿Cómo se llama tu primer mascota?</option>
															<?php endif; ?>

 																											 																							</select>









																																																		</div>
																																																		<div class="form-group">
																																																			<ul style="color:red; ">
																																																	 <?php if (isset($errores["respuesta-seguridad"])) : ?>
																																																		 <input style="border: 1px solid red;" type="text" class="form-control" placeholder="Respuesta de Seguridad *" value="" name="respuesta-seguridad" />
																																																												 <p style="color:red;font-size:8px;">
																																																													 <li>
																																																													 <?=$errores["respuesta-seguridad"]?>
																																																												 </li>
																																																												 </p>
																																																											 <?php else : ?>
																																																												 <input type="text" class="form-control" placeholder="Respuesta de Seguridad  *" value="<?=$respuestaSeguridadDefault?>" name="respuesta-seguridad"/>
																																																											 <?php endif; ?>
																																																										 </ul>
																																																										 </div>


																																																		<div class="form-group">
																																																			<p style="margin-left:17%">Fecha de nacimiento</p>
																											 																							<ul style="color:red; ">
																											 																							<?php if (isset($errores["nacimiento"])) : ?>
																											 																								<input style="border: 1px solid red;" type="text" class="form-control" placeholder="Fecha de nacimiento*" value="" name="nacimiento" />
																											 																																		<p style="color:red;font-size:8px;">
																											 																																			<li>
																											 																																			<?=$errores["nacimiento"]?>
																											 																																		</li>
																											 																																		</p>
																											 																																	<?php else : ?>
																											 																																		<input type="date" class="form-control" placeholder="Fecha de nacimiento*" value="<?=$nacimientoDefault?>"name="nacimiento" />
																											 																																	<?php endif; ?>
																											 																																</ul>
																											 																																</div>


																						</ul>
																							<input type="submit" class="btnRegister"  value="Registrarse" style="background-color:grey;width:92%;margin-left:8%;border-radius:5%"/>
																			</div>
																	</form>
                                  </div>




</body>
</html>
