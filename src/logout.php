<?php
  require_once "./core/imports.php";
  $isAuth = AuthController::getInstance()->checkAuth();

  if ($isAuth) {
    Session::delete("_uid");
  }
  Redirect::to("index.php");
?>
