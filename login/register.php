<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	header("Location: ./login.php");
}

include_once 'dbconnect.php';

//Establece el error de validación como flag
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	$ran_id = rand(time(), 100000000);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
  $status = "Activo ahora";
	$roll = ($_POST['roll']);
//	$img = ($_POST['img']);
	//	$revisar = getimagesize($_FILES["imagenes"]["tmp_name"]);
	//	if($revisar !== false){
	//	$image = $_FILES['imagenes']['tmp_name'];
	//	$imgContenido = addslashes(file_get_contents($image));
//}
if(isset($_FILES['image'])){
			$img_name = $_FILES['image']['name'];
			$img_type = $_FILES['image']['type'];
			$tmp_name = $_FILES['image']['tmp_name'];
			$img_explode = explode('.',$img_name);
			$img_ext = end($img_explode);
			$extensions = ["jpeg", "png", "jpg"];
			if(in_array($img_ext, $extensions) === true){
					$types = ["image/jpeg", "image/jpg",  "image/png"];
					if(in_array($img_type, $types) === true){
						$time = time();
						$new_img_name = $time.$img_name;
						if(move_uploaded_file($tmp_name,"images/".$new_img_name)){

}}}}


 	$terminosycond = mysqli_real_escape_string($con, $_POST['terminosycond']);
	date_default_timezone_set("America/Mexico_City");
	$mifecha = date('Y-m-d H:i:s');

	//Nombre sólo puede contener caracteres alfabéticos y espacio (esto varia sgun requerimiento)
	if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
		$error = true;
		$name_error = "El nombre debe contener solo caracteres del alfabeto y espacio.";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
		$error = true;
		$name_error = "El nombre debe contener solo caracteres del alfabeto y espacio.";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Ingresa un correo electrónico válido.";
	}
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
			if(mysqli_num_rows($sql) > 0){
					$error = true;
					$email_error = "Este Correo ya existe.";
			}
						}

	if(strlen($password) < 6) {
		$error = true;
		$password_error = "La contraseña debe tener un mínimo de 6 caracteres.";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Las contraseñas no coinciden";
	}

	if(!$terminosycond) {
		//$error = true;
		//$terminosycond_error = "Debes aceptar Terminos y condiciones";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(unique_id,fname,lname,email,password,img,status,roll,fecha_crea)
		VALUES('" . $ran_id . "','" . $fname . "','" . $lname . "', '" . $email . "', '" . md5($password) . "' ,'" . $new_img_name . "','" . $status . "','" . $roll . "', '" . $mifecha . "')")) {
			//$successmsg = "¡Registrado exitosamente! <a href='login.php'>Click here to Login</a>";
			$successmsg = '
			  <div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>EXITO.!</strong> ¡Registrado exitosamente!
			  </div>
			  ';
		} else {
			//$errormsg = "Error de registro. Vuelve a intentarlo más tarde.";
			$errormsg = '
			<div class="alert alert-danger alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Error de registro.!</strong> Verifica tus datos.
			</div>
			';
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro Usuario</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/style.css">
	<!--link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" /-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link rel="stylesheet" href="./style_register.css">
	<!---Iconos de bootstrap----->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body id="register">

	<div class="container-xl position-relative">
	    <picture>
	        <source media="(max-width: 768px)" type="image/webp" srcset="https://github.githubassets.com/images/modules/site/home-campaign/hero-bg-md.webp 1x, https://github.githubassets.com/images/modules/site/home-campaign/hero-bg.webp 2x">
	        <source media="(min-width: 1280px)" type="image/webp" srcset="https://github.githubassets.com/images/modules/site/home-campaign/hero-bg.webp 1x, https://github.githubassets.com/images/modules/site/home-campaign/hero-bg-2x.webp 2x">
	      <img alt="" aria-hidden="true" width="1850" class="position-absolute top-0 events-none" style="right: -1050px; max-width: calc(230vw + 1670px)" src="https://github.githubassets.com/images/modules/site/home-campaign/hero-bg.webp">
	    </picture>
	  </div>

<br><br>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform"  enctype="multipart/form-data"   >
				<fieldset>
					<legend>Registro</legend>

					<div class="form-group">
						<label for="name">Nombre </label>
						<input type="text" name="fname" placeholder="Nombre(s)" required value="<?php if($error) echo $fname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Apellido </label>
						<input type="text" name="lname" placeholder="Primer Apellido" required value="<?php if($error) echo $lname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Email</label>
							<input type="email" name="email" placeholder="Correo Electrónico" required value="<?php if($error) echo $email; ?>" class="form-control" />
							<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" id="myInput" name="password" placeholder="Contraseña" required class="form-control" />
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
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Repita Contraseña</label>
						<input type="password" name="cpassword" placeholder="Confirmar Contraseña" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>

					</div>

					<div class="form-group">
						<label for="name">Imagen de perfil</label>
						     <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
					</div>

					<div class="form-group">
						<label for="name">Usuario o Administrador </label>
						<select type="text" name="roll" placeholder="selecciona" required class="form-control" value="<?php echo $_POST["roll"]; ?>" />
						<option value="0">Selecciona una opcion</option>
						<option value="1">Usuario</option>
						<option value="2">Administrador</option>
					</select>
					</div>
			 			<div class="checkbox">
					    <label>
					      <input type="checkbox" name="terminosycond" id="terminosycond" required=""> Acepto todos los
					      <!-- Button trigger modal -->
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#TernimosCondiciones">
							  Terminos y condiciones
							</button>
							<br>
							<span class="text-danger"><?php if (isset($terminosycond_error)) echo $terminosycond_error; ?></span>
					    </label>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Registrar" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		Ya te registaste? <a href="login.php">Logeate Aqui</a>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>


<!-- Modal -->
<div class="modal fade" id="TernimosCondiciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
        	<b>Terminos y Condiciones </b>
        </h4>
      </div>
      <div class="modal-body">
        Esta es una prueba de lo que podriamos poner para los terminos y condiciones de la paguina que hagamos
        <br>
        <br>
        <p>
        	<b>Uso de la cuenta de usuario en xxxxxxxxxxxxxx </b>
        </p>
		<p>
			<ul>
				<li>El usuario de xxxxxxxxxxxxxx se compromete a proporcionar mediante su registro datos veraces, exactos y completos sobre su identidad. También se compromete a revisar periódicamente la información proporcionada y garantiza la validez y la vigencia de los datos asociados tanto a su cuenta de usuario como a los productos y servicios contratados. El incumplimiento de esta condición podrá motivar la cancelación de la cuenta y la denegación al usuario el acceso a los servicios de Registros.com de forma temporal o permanente.</li>
				<li>xxxxxxxxxxx se reserva el derecho de solicitar la verificación y / o actualización de la información proporcionada por el Cliente, quien deberá responder satisfactoriamente a la petición de xxxxxxxxxxxxxx  en el plazo máximo de 5 días laborables. El Cliente entiende y acepta que el no cumplimiento de este requisito constituye una vulneración del presente Acuerdo y puede dar lugar a la cancelación de los productos y/o servicios cont...</li>
				<br>
				<a href="#" class="btn btn-default btn-xs">
					<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Descargar PDF
				</a>
			</ul>
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <!--button type="button" class="btn btn-primary">Guardar Cambios</button-->
      </div>
    </div>
  </div>
</div>

<script>
	//Modal terminos y condiciones
	$('#TernimosCondiciones').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
</script>
