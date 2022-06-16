<?php

session_start();
$firstName = $_SESSION['firstName'];
$email = $_SESSION['email'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="vender/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <nav class="navbar bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold">Hello!</a>

        <div class="header__profile d-flex align-items-center gap-2">
          <!-- User Profile  -->
          <div class="header__profile-photo">
            <img
              loading="lazy"
              src="regdInfo/<?= "$email/$email.jpg"; ?>"
              alt="Profile Picture"
              title="Rohit Kumar"
              class="w-100 h-auto"
            />
          </div>
          <!-- User Name  -->
          <h6 class="text-white m-0">
            <?= $firstName; ?>  
          </h6>
        </div>
      </div>
    </nav>

    <script src="vender/bootstrap.bundle.min.js"></script>
  </body>
</html>
