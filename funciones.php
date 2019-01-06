<?php
require_once("conn.php");
session_start();

if (isset($_COOKIE["usuarioLogueado"]) && !isset($_SESSION["usuarioLogueado"])) {
  $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
}

function validarLogin() {
  $errores = [];

  if (estaVacio($_POST["email"])) {
    $errores["email"] = "Por favor complete su email";
  } else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "El email debe ser una casilla valida";
  } else if (!existeElEmail($_POST["email"])) {
  $errores["email"] = "El email no existe"; }

  if (!existeElPass($_POST["password"])&&!existeElEmail($_POST["email"])) {
    echo '<div class="alert alert-success" style="text-align:center;font-size:30px;color:"red">DEBES REGISTRARTE </div>';
    header("Refresh: 2; URL=registracion.php");exit;}

  if (estaVacio($_POST["password"])) {
    $errores["password"] = "Dejaste la contrasenia vacia";
  }

  if (empty($errores)) {
    $usuario = buscarUsuarioPorEmail($_POST["email"]);

    $hash = $usuario["password"];

    if (password_verify($_POST["password"], $hash) == false) {
      $errores["email"] = "El email y la contrasenia no verifican";
    }
  }

  return $errores;
}

function validarRegistracion() {
  $errores = [];

  $errorEnNombre = esAlfabeticoYMinimoCaracteres($_POST["nombre"], "nombre", 5);
  if ($errorEnNombre != null) {
    $errores["nombre"] = $errorEnNombre;
  }

  $errorEnApellido = esAlfabeticoYMinimoCaracteres($_POST["apellido"], "apellido", 5);
  if ($errorEnApellido != null) {
    $errores["apellido"] = $errorEnApellido;
  }



  if (estaVacio($_POST["password"])) {
    $errores["password"] = "Dejaste la contrasenia vacia";
  }
  if (estaVacio($_POST["cpassword"])) {
    $errores["cpassword"] = "Dejaste el campo confirmar contrasenia vacio";
  }
  if (!estaVacio($_POST["password"]) && !estaVacio($_POST["cpassword"]) && $_POST["password"] != $_POST["cpassword"]) {
    $errores["password"] = "Las contrasenias no coinciden";
  }

  if (isset($_POST["genero"]) == false) {
    $errores["genero"] = "Por favor tilda una opcion para genero";
  }

  if (estaVacio($_POST["email"])) {
    $errores["email"] = "Por favor complete su email";
  } else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "El email debe ser una casilla valida";
  } else if (existeElEmail($_POST["email"])) {
    $errores["email"] = "El email esta repetido";
  }

  if (estaVacio($_POST["telefono"])) {
    $errores["telefono"] = "Por favor complete su telefono";
  } else if (is_numeric($_POST["telefono"]) == false) {
    $errores["telefono"] = "El telefono debe ser un numero";
  }

  if (isset($_POST["pregunta-seguridad"]) == false) {
    $errores["pregunta-seguridad"] = "Elija una pregunta";
  }

  if (estaVacio($_POST["nacimiento"])) {
    $errores["nacimiento"] = "Por favor complete su fecha de nacimiento";
  }

  if (estaVacio($_POST["respuesta-seguridad"])) {
    $errores["respuesta-seguridad"] = "Complete la respuesta de seguridad";
  }

  if ($_FILES["avatar"]["error"] != 0) {
    $errores["avatar"] = "Hubo un error en la carga";
  } else {
    if ( $_FILES["avatar"]["type"] != ( "image/png" ) &&
        $_FILES["avatar"]["type"] != ( "image/jpeg" ) &&
        $_FILES["avatar"]["type"] != ( "image/gif" ) &&
        $_FILES["avatar"]["type"] != ( "image/psd" ) &&
        $_FILES["avatar"]["type"] != ( "image/bmp" ) ) {
      $errores["avatar"] = "Por favor subi una imagen";
    }
  }


  return $errores;
}



function validarBusqueda() {
  $errores = [];

  $errorEnBuscador = esAlfabeticoYMinimoCaracteres($_GET["buscador"], "buscador", 2);
  if ($errorEnBuscador != null) {
    $errores["buscador"] = $errorEnBuscador;
  }
  return $errores;
  }

function validarEdicion() {
  $errores = [];

  $errorEnNombre = esAlfabeticoYMinimoCaracteres($_POST["nombre"], "nombre", 3);
  if ($errorEnNombre != null) {
    $errores["nombre"] = $errorEnNombre;
  }

  $errorEnApellido = esAlfabeticoYMinimoCaracteres($_POST["apellido"], "apellido", 5);
  if ($errorEnApellido != null) {
    $errores["apellido"] = $errorEnApellido;
  }


  if (estaVacio($_POST["telefono"])) {
    $errores["telefono"] = "Por favor complete su telefono";
  } else if (is_numeric($_POST["telefono"]) == false) {
    $errores["telefono"] = "El telefono debe ser un numero";
  }
if (!existeElPassEd($_POST["passwordold"])){
  $errores["passwordold"] = "La Contasenia Actual no existe";

}





  if (estaVacio($_POST["password"])) {
    $errores["password"] = "Dejaste la contrasenia vacia";
  }
  if (estaVacio($_POST["cpassword"])) {
    $errores["cpassword"] = "Dejaste el campo confirmar contrasenia vacio";
  }
  if (!estaVacio($_POST["password"]) && !estaVacio($_POST["cpassword"]) && $_POST["password"] != $_POST["cpassword"]) {
    $errores["password"] = "Las contrasenias no coinciden";
  }

  if ($_FILES["avatarEd"]["error"] != 0) {
    $errores["avatarEd"] = "Hubo un error en la carga";
  } else {
    if ( $_FILES["avatarEd"]["type"] != ( "image/png" ) &&
        $_FILES["avatarEd"]["type"] != ( "image/jpeg" ) &&
        $_FILES["avatarEd"]["type"] != ( "image/gif" ) &&
        $_FILES["avatarEd"]["type"] != ( "image/psd" ) &&
        $_FILES["avatarEd"]["type"] != ( "image/bmp" ) ) {
      $errores["avatarEd"] = "Por favor subi una imagen";
    }
  }


  return $errores;
  }


function estaVacio($campo) {
  if ($campo == "") {
    return true;
  } else {
    return false;
  }
}

function esAlfabeticoYMinimoCaracteres($campo, $nombreCampo, $min) {
  if (estaVacio($campo)) {
    return "Dejaste el campo $nombreCampo vacio";
  } else if (strlen($campo) < $min) {
    return "El campo $nombreCampo tiene un minimo de $min caracteres";
  } else if (ctype_alpha($campo) == false) {
    return "El campo $nombreCampo debe ser alfabetico";
  } else {
    return null;
  }
}

function armarUsuario() {
  $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);

  return [
    "nombre" => trim($_POST["nombre"]),
    "apellido" => trim($_POST["apellido"]),
    "email" => trim($_POST["email"]),
    "ciudad" => trim($_POST["ciudad"]),
    "telefono" => trim($_POST["telefono"]),
    "pregunta-seguridad" => $_POST["pregunta-seguridad"],
    "respuesta-seguridad" => trim($_POST["respuesta-seguridad"]),
    "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
    "genero" => $_POST["genero"],
    "nacimiento" => $_POST["nacimiento"],
    "avatar" => uniqid() . "." . $ext,
  ];
}
function guardarAvatar($usuario) {
  move_uploaded_file($_FILES["avatar"]["tmp_name"], "avatars/" . $usuario["avatar"]);
}

function guardarAvatarEdicion($avatarname,$avatartmpname) {
  $ext = pathinfo($avatarname, PATHINFO_EXTENSION);
$avatar=uniqid() . "." . $ext;
  move_uploaded_file($avatartmpname, "avatars/" . $avatar);

  return $avatar;
}

function traerUsuarios() {
  global $db;

  $sql = "SELECT * FROM users";

  $consulta = $db->prepare($sql);

  $consulta->execute();

  return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function guardarUsuario($usuario) {
  global $db;

  $sql = "INSERT INTO users values(default, :nombre, :apellido, :email,:ciudad, :telefono, :preguntaSeguridad, :respuestaSeguridad, :password, :genero, :nacimiento, :avatar)";

  $consulta = $db->prepare($sql);

  $consulta->bindValue(":nombre", $usuario["nombre"]);
  $consulta->bindValue(":apellido",$usuario["apellido"]);
  $consulta->bindValue(":email",$usuario["email"]);
  $consulta->bindValue(":ciudad",$usuario["ciudad"]);
  $consulta->bindValue(":telefono", $usuario["telefono"]);
  $consulta->bindValue(":preguntaSeguridad", $usuario["pregunta-seguridad"]);
  $consulta->bindValue(":respuestaSeguridad", $usuario["respuesta-seguridad"]);
  $consulta->bindValue(":password", $usuario["password"]);
  $consulta->bindValue(":genero", $usuario["genero"]);
  $consulta->bindValue(":nacimiento", $usuario["nacimiento"]);
  $consulta->bindValue(":avatar", $usuario["avatar"]);

  $consulta->execute();
}

function existeElEmail($email) {
  if (buscarUsuarioPorEmail($email) === false) {
    return false;
  } else {
    return true;
  }
}

function actualizarUsuarioPorEmail($email,$nombre,$apellido,$telefono,$password,$avatar){

$password=password_hash($password, PASSWORD_DEFAULT);
global $db;
$sql="UPDATE users SET nombre=:nombre,apellido=:apellido,telefono=:telefono, password=:password,avatar=:avatar  WHERE email = :email ";
$consulta = $db->prepare($sql);

$consulta->bindValue(":email", $email);
$consulta->bindValue(":nombre", $nombre);
$consulta->bindValue(":apellido", $apellido);
$consulta->bindValue(":telefono", $telefono);
$consulta->bindValue(":password", $password);
$consulta->bindValue(":avatar", $avatar);
$consulta->execute();
}

function buscarUsuarioPorEmail($email) {
  global $db;

  $sql = "SELECT * FROM users WHERE email = :email";

  $consulta = $db->prepare($sql);

  $consulta->bindValue(":email", $email);

  $consulta->execute();

  return $consulta->fetch(PDO::FETCH_ASSOC);
}

function existeElPassEd($password) {
  $usuarios = traerUsuarios();
  foreach ($usuarios as $usuario) {
    $hash = $usuario["password"];
    if (password_verify($_POST["passwordold"], $hash) == true) {
      return true;
    }
  }

  return null;
}

function existeElPass($password) {
  $usuarios = traerUsuarios();
  foreach ($usuarios as $usuario) {
    $hash = $usuario["password"];
    if (password_verify($_POST["password"], $hash) == true) {
      return true;
    }
  }

  return null;
}






function buscarUsuarioPorId($id) {
  global $db;

  $sql = "SELECT * FROM users WHERE id = :id";

  $consulta = $db->prepare($sql);

  $consulta->bindValue(":id", $id);

  $consulta->execute();

  return $consulta->fetch(PDO::FETCH_ASSOC);
}
function buscarUsuarioPorIdNacimiento($id) {
  global $db;

  $sql = "SELECT nacimiento FROM users WHERE id = :id";

  $consulta = $db->prepare($sql);

  $consulta->bindValue(":id", $id);

  $consulta->execute();
    return $consulta->fetch(PDO::FETCH_ASSOC);


}


function buscadorUsuarios($busqueda, $genero, $fechaDesde, $fechaHasta) {

  global $db;

  $sql = "SELECT * FROM users WHERE (nombre like :nombre OR apellido like :apellido OR email like :email )";

  if ($genero != null) {
    $sql = $sql . " AND genero = :genero";
  }


  if ($fechaDesde != null) {
    $sql = $sql . " AND nacimiento >= :fechaDesde";
  }

  if ($fechaHasta != null) {
    $sql = $sql . " AND nacimiento <= :fechaHasta";
  }




  $sql = $sql .  " order by email";

  $consulta = $db->prepare($sql);

  $consulta->bindValue(":nombre", "%" . $busqueda . "%");
  $consulta->bindValue(":apellido", "%" . $busqueda . "%");
  $consulta->bindValue(":email", "%" . $busqueda . "%");



  if ($genero != null) {
    $consulta->bindValue(":genero", $genero);
  }
  if ($fechaDesde != null) {
    $consulta->bindValue(":fechaDesde", $fechaDesde);
  }
  if ($fechaHasta != null) {
    $consulta->bindValue(":fechaHasta", $fechaHasta);
  }


  $consulta->execute();

  return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function traerUsuariosJSON() {
  $leerArchivo = file_get_contents("usuarios.json");

  if ($leerArchivo == "") {
    return [];
  }

  $usuarios = json_decode($leerArchivo, true);

  return $usuarios;
}
