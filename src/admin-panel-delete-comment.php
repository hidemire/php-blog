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

  if (Input::exists()) {
    $commentId = Input::get("commentId");
    if (!isset($commentId)) {
      Redirect::to("index.php");
      // exit();
    }
    $post = PostController::getInstance()->deleteComment($commentId);
    Redirect::to("index.php");
  }

  Redirect::to("index.php");
  // exit();
?>