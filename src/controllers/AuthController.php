<?php
  class AuthController
  {
    private static $instance = null;

    public static function getInstance(): AuthController
    {
      if (static::$instance === null) {
        static::$instance = new AuthController();
      }

      return static::$instance;
    }

    public function checkAuth()
    {
      $uid = Session::get("_uid");
      if ($uid) {
        return true;
      } else {
        return false;
      }
    }

    public function login($email, $password)
    {
      $user = UserRepository::getInstance()->getByCreds($email, $password);
      if ($user) {
        Session::put("_uid", $user->id);
        Session::put("_urole", $user->role);
        return true;
      } else {
        return false;
      }
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
  }
?>