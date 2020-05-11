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

    public function getById($postId) {
      $query = "SELECT p.*, u.name creator, t.name tag_name
        FROM posts p
          LEFT JOIN users u
          ON u.id = p.authorId
          LEFT JOIN tags t
          ON t.id = p.tagId
          WHERE p.id = $postId";
      
      $res = $this->db->query($query) or die($this->db->error);
      $row = $res->fetch_assoc();

      if (!$row) {
        return null;
      }

      $row["decoded_data"] = json_decode($row["data"], true);

      // Fetch comments
      $query = "SELECT * from comments where postId = $postId";
      $res = $this->db->query($query) or die($this->db->error);
      $comments = [];
      while($c = $res->fetch_assoc()) {
        $comments[] = $c;
      }
      $row["comments"] = $comments;
      
      // Fetch likes
      $query = "SELECT l.*, u.name user_name
        FROM likes l
        LEFT JOIN users u
          ON u.id = l.userId
        WHERE postId = $postId";
      $res = $this->db->query($query) or die($this->db->error);
      $likes = [];
      while($l = $res->fetch_assoc()) {
        $likes[] = $l;
      }
      $row["likes"] = $likes;

      return $row;
    }

    public function get($title, Pagination $pagination, $tagId = -1) {
      $query = "SELECT p.*, u.name creator, t.name tag_name
        FROM posts p
          LEFT JOIN users u
          ON u.id = p.authorId
          LEFT JOIN tags t
          ON t.id = p.tagId";
      
      if($tagId != -1) {
        $query = $query." where p.tagId = $tagId";
      }

      $query = $query." order by p.createdAt desc";

      if ($pagination) {
        $query = $query." LIMIT $pagination->offset, $pagination->count";
      }

      $res = $this->db->query($query) or die($this->db->error);
      $rows = [];

      while ($row = $res->fetch_assoc()) {
        $resC = $this->db->query("SELECT * from comments where postId = ".$row["id"]) or die($this->db->error);
        $comments = [];
        while($c = $resC->fetch_assoc()) {
          $comments[] = $c;
        }
        $row["comments"] = $comments;

        $row["decoded_data"] = json_decode($row["data"], true);
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

    public function create($authorId, $title, $data, $tagId) {
      $res = $this->db->query("INSERT INTO posts SET authorId='$authorId', title='$title', data='$data', tagId='$tagId'") or die($this->db->error);

      return $res;
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