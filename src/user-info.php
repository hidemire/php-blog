<?php
  require_once "./core/imports.php";
  $pageName = "UserInfo";

  $isAuth = AuthController::getInstance()->checkAuth();

  if (!$isAuth) {
    Redirect::to("index.php");
  }

  $userId = $_SESSION["_uid"];

  $user = UserController::getInstance()->getById($userId);

  if (Input::exists()) {
    $name = Input::get("name");
    $name = isset($name) && !is_null($name) ? $name : $user->name;

    $login = Input::get("login");
    $login = isset($login) && !is_null($login) ? $login : $user->login;
    
    $email = Input::get("email");
    $email = isset($email) && !is_null($email) ? $email : $user->email;
    
    $bio = Input::get("bio");
    $bio = isset($bio) && !is_null($bio) ? $bio : $user->bio;
    
    $oldPassword = Input::get("oldPassword");
    $newPassword = Input::get("newPassword");
    
    $user = UserController::getInstance()->update(
      $user,
      $name,
      $login,
      $email,
      $bio,
      $oldPassword,
      $newPassword
    );
    //var_dump($user);

    if ($user) {
      echo "success";
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

  <div id="content">
    <div class="container">
     
          <?php include "./templates/user-info-form.php" ?>
     
    </div>
  </div>
  
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>

  <script src="dist/js/form-validator.min.js" type="text/javascript">
  </script> 
  <script src="dist/js/update-user-info.js" type="text/javascript">
  </script>
</body>