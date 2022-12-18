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
    <link rel="stylesheet" href="./css_chat/chat_start.css">
    <link rel="stylesheet" href="../css_chat/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title></title>
  </head>
  <body>


<!--Inicio del chat-->

      <?php

        $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
        $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$user_id}");
      if($user_id ){


              $row = mysqli_fetch_assoc($sql);
            ?>
            <div class="wrapper" style="
                width: 432px!important;
                margin-left: 423px!important;
                display: grid; ">
              <section class="chat-area"  style="  width: 613px;">
                <header>
              <img id="img_perfil" src="../login/images/<?php echo $row['img']; ?>" alt="">
              <div class="details">
                <span class="name"><?php echo $row['fname']. " " . $row['lname'] ?></span>
                <p ><?php echo $row['status']; ?></p>
              </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
              <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
              <input type="text" name="message" class="input-field" placeholder="Escribe un mensaje aquí ..." autocomplete="off">
              <button><i class="fab fa-telegram-plane"></i></button>
            </form>
          </section>
        </div>

        <script src="js/chat.js"></script>
              <?php

          }elseif(!$user_id ){
            echo "No hay chat seleccionado";
          }
        ?>


  </body>
</html>


  <script type="text/javascript">
    const body = document.querySelector('body'),
    titulo = div.querySelector(".titulo");
    details = div.querySelector(".details");

  </script>

      <script>
        const body = document.querySelector('body'),

         titulo = body.querySelector(".titulo");


      </script>
