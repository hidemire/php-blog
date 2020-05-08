<?php
class User
{
  public $id;
  public $createdAt;
  public $name;
  public $login;
  public $email;
  public $password;
  public $bio;
  public $role = 0;

  function __construct(
    $id,
    $createdAt,
    $name,
    $login,
    $email,
    $password,
    $bio,
    $role
  ) {
    $this->id = $id;
    $this->createdAt = $createdAt;
    $this->name = $name;
    $this->login = $login;
    $this->email = $email;
    $this->password = $password;
    $this->bio = $bio;
    $this->role = $role;
  }
}
?>