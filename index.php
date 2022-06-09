<?php
   if (isset($_POST['login'])) {
      $email    = $_POST['email'];
      $password = $_POST['password'];

      $isValid  = empty($email) ||
                  empty($password);

        if ($isValid) {
          $errorMsg = "Please enter a valid user name and password";
        } else {
            if (is_dir("regdInfo/$email")) {
                  $fileOpen = fopen("regdInfo/$email/info.txt", "r");
                  session_start(); // session start if you get first name
                  $_SESSION['firstName'] = fgets($fileOpen); // in info folder 1st line username
                  fgets($fileOpen);
                  fgets($fileOpen);
                 $getInfoPassword =  trim(fgets($fileOpen));
                    if ($password == $getInfoPassword) {
                      session_start();
                      $_SESSION['email'] = $email;
                      header("location:account.php");
                    } else {
                      $errorMsg = "Please enter correct password";
                    }
                    
            } else {
              $errorMsg = "Please enter correct email";
            }
            
        }
        

    
   } else {
      $errorMsg = "Please enter a valid email";
   }
   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="vender/bootstrap.min.css" />
  </head>

  <body>
    <div class="login w-100 vh-100">


    <div style="height:58px">
      <?php
        if (isset($errorMsg)) {
          ?>
              <div class="alert alert-danger m-0" role="alert">
                <?= $errorMsg; ?>
              </div>
          <?php
        }
      ?>
    </div>
    
    
      <div class="container">
        <div class="login__content">
          <h1 class="login__title text-center m-0 pt-5">Login</h1>

          <form class="w-50 mx-auto mt-5" action="" method="post">
            <div class="my-2">
              <label for="email" class="form-label fs-4 fw-bold"
                >Email address</label
              >
              <input
                type="email"
                name="email"
                class="form-control"
                id="email"
                placeholder="Enter your email"
              />
            </div>

            <div class="my-2">
              <label for="password" class="form-label fs-4 fw-bold"
                >Password</label
              >
              <input
                type="password"
                name="password"
                class="form-control"
                id="password"
                placeholder="Enter your password"
              />
            </div>

            <div class="form-check my-2">
              <input
                class="form-check-input"
                name="checkbox"
                type="checkbox"
                id="checkbox"
              />
              <label class="form-check-label" for="checkbox">
                Remember me
              </label>
            </div>

            <div>
              <input
                class="btn btn-dark my-2"
                name="login"
                type="submit"
                value="Login"
              />

              <a href="regd.php" class="btn btn-success m-2"
                >Create New Account</a
              >
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="vender/bootstrap.bundle.min.js"></script>
  </body>
</html>
