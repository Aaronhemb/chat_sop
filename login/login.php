<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location:login.php");
}

include_once 'dbconnect.php';

//Comprobar de envío el formulario
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		//$_SESSION['usr_estado'] = $row['estado'];

		if($row['estado']==0){
			$_SESSION['usr_id'] = $row['user_id'];
			$_SESSION['usr_fname'] = $row['fname'];
			$_SESSION['usr_lname'] = $row['lname'];
			$_SESSION['usr_email'] = $row['email'];
	 
			$_SESSION['usr_unique_id'] = $row['unique_id'];


			header("Location: ../admin/index.php");
		}else
		$errormsg = "Esta cuenta esta desactivada";
	} else {
		$errormsg = "Revisa los datos!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de session</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="./style.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<!---Iconos de bootstrap----->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body id="Login" style="
background-image: url(https://github.githubassets.com/images/modules/site/home-campaign/bg-stars-1.webp);
background-size: 80%;
/* background-blend-mode: overlay; */
background-color: rgb(0 0 0) !important;
background-blend-mode: difference;
	">

	<div class="backg">
     <div class="planet">
       <div class="r1"></div>
       <div class="r2"></div>
       <div class="r3"></div>
       <div class="r4"></div>
       <div class="r5"></div>
       <div class="r6"></div>
       <div class="r7"></div>
       <div class="r8"></div>
       <div class="shad"></div>
     </div>
     <div class="stars">
       <div class="s1"></div>
       <div class="s2"></div>
       <div class="s3"></div>
       <div class="s4"></div>
       <div class="s5"></div>
       <div class="s6"></div>
     </div>
     <div class="an">
       <div class="tank"></div>
       <div class="astro">

           <div class="helmet">
             <div class="glass">
               <div class="shine"></div>
             </div>
           </div>
           <div class="dress">
             <div class="c">
               <div class="btn1"></div>
               <div class="btn2"></div>
               <div class="btn3"></div>
               <div class="btn4"></div>
             </div>
           </div>
           <div class="handl">
             <div class="handl1">
               <div class="glovel">
                 <div class="thumbl"></div>
                 <div class="b2"></div>
               </div>
             </div>
           </div>
           <div class="handr">
             <div class="handr1">
               <div class="glover">
                 <div class="thumbr"></div>
                 <div class="b1"></div>
               </div>
             </div>
           </div>
           <div class="legl">
             <div class="bootl1">
               <div class="bootl2"></div>
             </div>
           </div>
           <div class="legr">
             <div class="bootr1">
               <div class="bootr2"></div>
             </div>
           </div>
           <div class="pipe">
             <div class="pipe2">
               <div class="pipe3"></div>
             </div>
           </div>
         </div>
       </div>
     </div>

<br><br>
<div class="container" style="margin-top: 54px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>


					<div class="form-group">
						<label for="name">E-mail</label>
						<input type="text" name="email" placeholder="Ingresar Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" id="myInput" name="password" placeholder="Ingresar Contraseña" required class="form-control" />
						<i class="fa fa-eye" onclick="myFunction()"  style="margin-left: 320px;
																																	margin-top: -23px;
																																	display: inline-flex;
																																	position: absolute;
																															}"></i>
						<script type="text/javascript">
						function myFunction() {
						var x = document.getElementById("myInput");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
						}
						}
						</script>
					</div>

					<div class="form-group">
					<!--<input type="submit" name="login" value="Iniciar Sesion" class="btn btn-primary" /> -->
            <input type="submit" name="login" value="Iniciar Sesion" class="btn btn-primary" />
            <input type="reset" value="Limpiar" class="btn btn-default" >
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		No tienes cuenta? <a href="register.php">Regitrate aqui</a>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
