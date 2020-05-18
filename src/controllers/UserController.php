<?php
  class UserController
  {
    private static $instance = null;

    public static function getInstance(): UserController
    {
      if (static::$instance === null) {
        static::$instance = new UserController();
      }

      return static::$instance;
    }

    public function create($name, $login, $email, $password) {
      // $user = new User(-1, -1, $name, $login, $email, md5($password), 0);

      // return UserRepository::getInstance()->create($user);
      return UserRepository::getInstance()->create(
        $name,
        $login,
        $email,
        $password
      );
    }

    public function update(
      $user,
      $name,
      $login,
      $email,
      $bio,
      $oldPassword,
      $newPassword
    ) {
      return UserRepository::getInstance()->update(
        $user,
        $name,
        $login,
        $email,
        $bio,
        $oldPassword,
        $newPassword
      );
    }

    public function getById($id) {
      return UserRepository::getInstance()->getById($id);
    }
  }
?>