<?php
session_start();

if(isset($_SESSION['usr_unique_id'])) {
	session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_fname']);
	unset($_SESSION['usr_email']);


	header("Location: ../login/login.php");
} else {
	header("Location:  ../login/login.php");
}
?>
