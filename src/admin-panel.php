<?php
  require_once "./core/imports.php";
  $pageName = "AdminPanel";

  $isAuth = AuthController::getInstance()->checkAuth();

  if (!$isAuth) {
    Redirect::to("index.php");
  }

  $userId = $_SESSION["_uid"];

  $user = UserController::getInstance()->getById($userId);

  if (($user->role & $ADMIN_ROLE) != $ADMIN_ROLE) {
    // Update user role in session key
    Session::put("_urole", $user->role);
    Redirect::to("index.php");
  }

  $likesCount = PostController::getInstance()->getLikesCount();

  // var_dump($user);
?>

<head>
  <?php include "./templates/head.php" ?>
</head>
<body>
  <?php include "./templates/header.php" ?>
  <?php include "./templates/admin/hero.php" ?>

  <div id="content">
    <div class="container">
      <canvas id="chart"></canvas>
    </div>
  </div>
  <script>
    const _LIKES = <?= json_encode($likesCount) ?>;
  </script>
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>
  <?php include "./templates/scripts/admin.php" ?>
</body>