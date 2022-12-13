
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---======= CSS ======== -->
    <link rel="stylesheet" href="./css_chat/siderbar.css">
    <!--===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--<title>Dashboard Sidebar Menu</title>-->
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                    <?php
                      $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['usr_unique_id']}");
                      if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                      }
                    ?>
                    <img id="img_menu" src="../login/images/<?php echo $row['img']; ?>" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"> <?php echo $_SESSION['usr_fname'];
                                                    echo "</br>";
                                                    echo $_SESSION['usr_lname']; ?></span>
                    <span class="profession">ID: <?php echo $_SESSION['usr_unique_id']; ?></span>


                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
              <div class="bottom-content">
                  <li class="">
                      <a href="../login/logout.php">
                          <i class='bx bx-log-out icon' ></i>
                          <span class="text nav-text">Logout</span>
                      </a>
                  </li>

                  <li class="mode">
                      <div class="sun-moon">
                          <i class='bx bx-moon icon moon'></i>
                          <i class='bx bx-sun icon sun'></i>
                      </div>
                      <span class="mode-text text">Dark mode</span>

                      <div class="toggle-switch">
                          <span class="switch"></span>
                      </div>
                  </li>

              </div>
              <div class="search">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                    <button disabled><i style="display:none;" class="fas fa-search"></i></button>
                 </li>
                </div>
            <!--Aqui inicia el buscador de los chat-->

            <div class="users-list">

            </div>
            <script src="./js/usuarios.js"></script>
            <!--Aqui comienza el boton para salir-->

        </div>

    </nav>



    <script>
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
       titulo = body.querySelector(".titulo");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");

    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";

    }
});
    </script>

</body>
</html>
