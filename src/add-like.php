<?php
  require_once "./core/imports.php";
  $pageName = "AddLike";

  $isAuth = AuthController::getInstance()->checkAuth();

  if (!$isAuth) {
    Redirect::to("index.php");
  }

  if (Input::exists()) {
    $postId = Input::get("postId");
    $userId = $_SESSION["_uid"];

    $post = PostController::getInstance()->getById($postId);
    if (!$post) {
      Redirect::to("index.php");
    }

    $like = PostController::getInstance()->addLike($postId, $userId);

    if ($like) {
      echo "success";
    } else {
      header("HTTP/1.1 500");
    }
    exit();
  }
  
  Redirect::to("index.php");
?>