<?php
  require_once "./core/imports.php";
  $pageName = "AdminPanel";

  $isAuth = AuthController::getInstance()->checkAuth();

  if (!$isAuth) {
    Redirect::to("index.php");
  }

  $userId = $_SESSION["_uid"];

  $user = UserController::getInstance()->getById($userId);

  $posts = PostController::getInstance()->get(0, 99999999, -1);
?>

<head>
  <?php include "./templates/head.php" ?>
</head>
<body>
  <?php include "./templates/header.php" ?>
  <?php include "./templates/admin/hero.php" ?>

  <div id="content">
    <div class="container">
        <?php include "./templates/admin/post-list.php" ?>
    </div>
  </div>
  
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>
  <?php include "./templates/scripts/admin.php" ?>
</body>