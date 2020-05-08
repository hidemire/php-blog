<?php

class UserRepository
{
    private static $instance = null;

    private $db;

    public static function getInstance(): UserRepository
    {
      if (static::$instance === null) {
        static::$instance = new static();
      }

      return static::$instance;
    }

    public function getById($id)
    {
      $res = $this->db->query("SELECT * FROM `users` where `id` = '{$id}'") or die($this->db->error);
      $row = $res->fetch_assoc();

      if($row) {
        return $this->getUserFromRow($row);
      }

      return null;
    }

    public function getByCreds($email, $password)
    {
      $pwd = md5($password);

      $res = $this->db->query("SELECT * FROM `users` WHERE `password` = '{$pwd}' and `email` = '{$email}';") or die($this->db->error);
      $row = $res->fetch_assoc();

      if ($row) {
        return $this->getUserFromRow($row);
      }

      return null;
    }

    public function create($name, $login, $email, $password)
    {
      $us = $this->db->query("SELECT * FROM `users` WHERE `email` = '{$email}';") or die($this->db->error);
      if($us->fetch_assoc()) {
        return "User already exists";
      }

      $password = md5($password);

      $res = $this->db->query("INSERT INTO users SET name='$name', login='$login', email='$email', password='$password'") or die($this->db->error);

      return $res;
    }

    private function getUserFromRow($row) {
      return new User(
        $row["id"],
        $row["createdAt"],
        $row["name"],
        $row["login"],
        $row["email"],
        $row["password"],
        $row["bio"],
        $row["role"]
      );
    }

    private function __construct()
    {
        $this->db = DatabaseConnectionProvider::getConnection();
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
?>