<?php

class TagRepository
{
    private static $instance = null;

    private $db;

    public static function getInstance(): TagRepository
    {
      if (static::$instance === null) {
        static::$instance = new static();
      }

      return static::$instance;
    }

    public function getAll()
    {
        $res = $this->db->query("SELECT * FROM `tags`;") or die($this->db->error);
        $rows = [];
        
        while ($row = $res->fetch_assoc()) {
            $rows[] = new Tag($row["id"], $row["name"]);
        }

        return $rows;
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