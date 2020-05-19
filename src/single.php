<?php
  require_once "./core/imports.php";
  $pageName = "Single";

  $isAuth = AuthController::getInstance()->checkAuth();

  if (!$isAuth) {
    Redirect::to("index.php");
  }

  if (!isset($_GET["id"]) || (int)$_GET["id"] < 1) {
    Redirect::to("index.php");
  }

  $userId = $_SESSION["_uid"];

  $user = UserController::getInstance()->getById($userId);

  $postId = abs(isset($_GET["id"]) ? (int)$_GET["id"] : 1);

  $post = PostController::getInstance()->getById($postId);

  if (!$post) {
    Redirect::to("index.php");
  }

  // var_dump($post);
?>

<head>
  <?php include "./templates/head.php" ?>
</head>
<body>
  <?php include "./templates/header.php" ?>

  <div id="content">
    <div class="container">
    <div class="row">
        <div class="col-md-8">
          <?php include "./templates/post-view.php" ?>
        </div>
        <div class="col-md-4">
          <div class="sidebar">
            <?php include "./templates/categories.php" ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>

  <script src="dist/js/add-comment.js" type="text/javascript"></script>
  <script src="dist/js/add-like.js" type="text/javascript"></script>
</body>
