<?php
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $temporary=$_FILES['file']['tmp_name'];
    $fileName=$_FILES['file']['name'];
    $extension=pathinfo($fileName,PATHINFO_EXTENSION);

    $isEmpty = empty($firstName) ||
               empty($lastName)  ||
               empty($email)     ||
               empty($password);

    $isExtension = $extension == "jpg" || 
                   $extension == "png" || 
                   $extension == "gif" || 
                   $extension == "jpeg";

    $info = "$firstName \n$lastName\n$email\n$password";    

    if ($isEmpty) {
     $errorMsg = "Please fill blank space";
    } else {
     
      if ($isExtension) {
          if (is_dir("regdInfo/$email")) {
            $errorMsg = "Email already registered";
          }else {
            mkdir("regdInfo/$email");
              if(move_uploaded_file($temporary,"regdInfo/$email/$email".".jpg")){
                  file_put_contents("regdInfo/$email/info.txt", $info);
                  header("location:index.php");
              }else {
                  $errorMsg="Uploading error";
              }
          }
      }else {
        $errorMsg = "Image only support jpg, png, gif, jpeg file extension";
      }  
    }            
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration</title>
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
          <h1 class="login__title text-center pt-5 m-0">Registration</h1>

          <form
            class="w-50 mx-auto pt-md-5"
            method="post"
            enctype="multipart/form-data"
          >
            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="firstName" class="form-label fs-4 fw-bold"
                  >First Name</label
                >
                <input
                  type="firstName"
                  name="firstName"
                  class="form-control"
                  id="firstName"
                  placeholder="Enter your first name"
                  
                />
              </div>

              <div class="col-md-6 mb-2">
                <label for="lastName" class="form-label fs-4 fw-bold"
                  >Last Name</label
                >
                <input
                  type="lastName"
                  name="lastName"
                  class="form-control"
                  id="lastName"
                  placeholder="Enter your last name"
                  
                />
              </div>
            </div>

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

            <div class="my-2">
              <label for="file" class="form-label fs-4 fw-bold"
                >Upload image</label
              >
              <input
                type="file"
                class="form-control"
                name="file"
                id="file"
                
              />
            </div>

            <div>
              <input
                class="btn btn-dark my-2"
                name="submit"
                type="submit"
                value="Submit"
              />

              <a href="index.php" class="btn btn-success m-2"
                >Login</a
              >
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="vender/bootstrap.bundle.min.js"></script>
  </body>
</html>



