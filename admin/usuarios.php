<?php
    session_start();
    include_once "../login/dbconnect.php";
    $outgoing_id = $_SESSION['usr_unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No hay usuarios disponibles para chatear.";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>
