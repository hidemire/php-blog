<?php
  require_once "./core/imports.php";
  $pageName = "AddComment";

  $isAuth = AuthController::getInstance()->checkAuth();

  if (!$isAuth) {
    Redirect::to("index.php");
  }

  if (Input::exists()) {
    $postId = Input::get("postId");
    $message = Input::get("message");
    $userId = $_SESSION["_uid"];

    $post = PostController::getInstance()->getById($postId);
    if (!$post) {
      Redirect::to("index.php");
    }

    $comment = PostController::getInstance()->addComment($postId, $userId, $message);

    if ($comment) {
      echo "success";
    } else {
      header("HTTP/1.1 500");
    }
    exit();
  }
  
  Redirect::to("index.php");
?>