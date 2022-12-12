<?php
	session_start();
	include_once 'login/dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio | Panel de Control</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="login/css/style.css">
	<link rel="stylesheet" href="login/css/bootstrap.min.css" type="text/css" />

</head>
<body id="inicio"   bgcolor="FFCECB" style="

background: url(login/image/2.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
background: none;
">

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php" style="font-family: 'Lobster', cursive;"><img src="login/image/logo-HA.png" alt="HA" width="110px"  ></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Logeado como <i class="btn btn-danger btn-xs" ><b><?php echo $_SESSION['usr_name']; ?></b></i></p></li>
				<li><a href="login/logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login/login.php">Login</a></li>
				<li><a href="login/register.php">Registro</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>




<div class="container">

      <!--Componente principal de un mensaje de primario o llamado a la acción
      <div class="jumbotron">
         <h1>Navbar example</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs »</a>
        </p>
      </div>  -->
			<br><br><br>
			<h1 class="titulo" >Hospital Angeles control de sedes</h1>

  </div>
  <br><br><br>
  <br><br><br>
  <div class="cierre">
    <footer >
      <center>
        <h4 class="h4">Creadores</h4>
        <p class="p">© 2018 AHcompany - Todos los derechos reservados.</p>
        <center>
    </footer>
  </div>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
