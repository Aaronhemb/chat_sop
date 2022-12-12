<?php
//Conneccion a la base de dato
//cuando se sube al servidor se debe colocar el nombre del host / el nombre del usuario / la contraseña de la base de datos
// y por ultimo el nombre de la base de datos
$con = mysqli_connect("localhost", "root", "", "chatapp") or die("Error " . mysqli_error($con));
?>
