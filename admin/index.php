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
    <link rel="stylesheet" href="./css_chat/index.css">
      <link rel="stylesheet" href="./css_chat/siderbar.css">
    <title></title>
  </head>
  <body>

<div class="titulo" id="perfil">
  <?php
    $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['usr_unique_id']}");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
    }
  ?>
   <img id="img_perfil" src="../login/images/<?php echo $row['img']; ?>" alt="">
      <label for="" id="email_perfil"><?php  echo $_SESSION['usr_email']; ?> </label>
     
</div>
  <script type="text/javascript">
    const body = document.querySelector('body'),
    titulo = div.querySelector(".div");
    Usuario = div.querySelector(".div");

  </script>

  </body>
</html>
