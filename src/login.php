<?php
  require_once "./core/imports.php";

  if (Input::exists()) {
    $email = Input::get("email");
    $password = Input::get("password");

    $login = AuthController::getInstance()->login($email, $password);

    if ($login) {
      echo "success";
    } else {
      header("HTTP/1.1 401 Unauthorized");
    }
    exit();
  }



  $pageName = "Login";

  $isAuth = AuthController::getInstance()->checkAuth();

  if ($isAuth) {
    Redirect::to("index.php");
  }
?>

<head>
  <?php include "./templates/head.php" ?>
</head>
<body>
  <?php include "./templates/header.php" ?>
  <?php include "./templates/hero-login.php" ?>
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 contact-form">
          <?php include "./templates/login-form.php" ?>
        </div>
      </div>
    </div>
  </div><!-- Content End -->
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>
  <script src="dist/js/form-validator.min.js" type="text/javascript">
  </script> 
  <script src="dist/js/login-form-script.js" type="text/javascript">
  </script> 
</body>