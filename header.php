<header>
  <ul class="links">
    <?php if (isset($_SESSION["usuarioLogueado"]))  : ?>
<br>
<h4 style="margin-left:36%">Hola <?=buscarUsuarioPorEmail($_SESSION["usuarioLogueado"])["nombre"]?></h4>
      <ul class="nav nav-tabs" style="margin-top:-2%">
            <li class="nav-item active"> <a class="nav-link active" href="logout.php" style="margin-right:1%" >Logout</a> </li>
            <li class="nav-item active"> <a class="nav-link active" href="index.php">Inicio</a> </li>
            <li style="margin-left:70%;margin-bottom:-2.5%"><img src="avatars/<?=$usuario["avatar"]?>" width=70 height=70></li>
          </ul>



    <?php else: ?>
      <ul class="nav nav-tabs"style="margin-bottom:5%;margin-top:1%">
            <li class="nav-item active"style="margin-right:0.1%" > <a class="nav-link active" href="registracion.php">Registracion</a> </li>
            <li class="nav-item active" > <a class="nav-link active" href="login.php">Login</a> </li>

          </ul>
    <?php endif; ?>
  </ul>
</header>
