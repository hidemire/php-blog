<?php

class PostRepository
{
    private static $instance = null;

    private $db;

    public static function getInstance(): PostRepository
    {
      if (static::$instance === null) {
        static::$instance = new static();
      }

      return static::$instance;
    }

    public function get($title, Pagination $pagination) {
      $query = "SELECT *
        FROM posts p
          LEFT JOIN likes i
          ON i.postId = p.id
          LEFT JOIN comments c
          ON c.postId = p.id
          LEFT JOIN users u
          ON u.id = p.authorId";
      if ($pagination) {
        $query = $query." LIMIT $pagination->offset, $pagination->count";
      }

      $res = $this->db->query($query) or die($this->db->error);
      $rows = [];

      while ($row = $res->fetch_assoc()) {
        // $rows[] = new Post($row["id"], $row["authorId"], $row["title"], $row["createdAt"], $row["tagId"]);
        $rows[] = $row;
      }
      
      return $rows;
    }

    public function getCount($tagId) {
      $query = "SELECT count(*) as total from posts ";
      if ($tagId > -1) {
        $query = $query."where tagId = '$tagId'";
      }
      $res = $this->db->query($query) or die($this->db->error);
      $data = $res->fetch_assoc();
      return $data['total'];
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