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

  $postId = $_GET["id"];
  if (!isset($postId)) {
    Redirect::to("/admin-panel-post-list.php");
    exit();
  }

  $post = PostController::getInstance()->getById($postId);

  if (Input::exists()) {
    $data = addslashes(html_entity_decode(Input::get("data"), true));
    $title = Input::get("title");
    $tagId = Input::get("tagId");
    
    $post = PostController::getInstance()->update($post, $data, $title, $tagId);

    if ($post) {
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
  <?php include "./templates/admin/hero.php" ?>

  <div id="content">
    <div class="container">
        <?php include "./templates/admin/comment-editor.php" ?>
        <?php include "./templates/admin/post-editor.php" ?>
    </div>
  </div>
  
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>
  <?php include "./templates/scripts/admin.php" ?>
  <script src="dist/js/admin-post-edit.js" type="text/javascript"></script> 
</body>