<?php
  session_start();
  include_once "../login/dbconnect.php";
  if(!isset($_SESSION['usr_unique_id'])){
    header("location:../login/login.php");
  }
?>
<?php include ("siderbar.php"); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="Usuario" style="margin-left:250px;">
      <?php echo $_SESSION['usr_unique_id'];
            echo $_SESSION['usr_fname'];
            echo $_SESSION['usr_email'];

        ?>
    </div>
<div class="">
  <?php
    $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
    }
  ?>
  <img id="img_perfil" src="../login/images/<?php echo $row['img']; ?>" alt="">
</div>


  </body>
</html>
