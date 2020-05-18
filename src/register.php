<?php
  require_once "./core/imports.php";
  $isAuth = AuthController::getInstance()->checkAuth();

  if ($isAuth) {
    Redirect::to("index.php");
  }

  if (Input::exists()) {
    $name = Input::get("name");
    $login = Input::get("login");
    $email = Input::get("email");
    $password = Input::get("password");

    
    $user = UserController::getInstance()->create($name, $login, $email, $password);
    //var_dump($user);

    if ($user) {
      if ($user == "User already exists") {
        header("HTTP/1.1 400");
      } else {
        echo "success";
      }
    } else {
      header("HTTP/1.1 500");
    }
    exit();
  }
?>

<head>
  <?php include "./templates/head.php" ?>
</head>
<body>
  <?php include "./templates/header.php" ?>
  <?php include "./templates/hero-register.php" ?>
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 contact-form">
          <?php include "./templates/register-form.php" ?>
        </div>
      </div>
    </div>
  </div>
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>
  <script src="dist/js/form-validator.min.js" type="text/javascript">
  </script> 
  <script src="dist/js/register-form-script.js" type="text/javascript">
  </script>
</body>