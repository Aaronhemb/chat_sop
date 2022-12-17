<?php
    session_start();
  include_once "../login/dbconnect.php";
    $outgoing_id = $_SESSION['usr_unique_id'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' )  ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No se encontró ningún usuario relacionado con su término de búsqueda';
    }
    echo $output;
?>
