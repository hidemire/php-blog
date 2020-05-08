<?php
class DatabaseConnectionProvider {
    private static $db;

    private $hostname = "db";
    private $username = "user"; 
    private $password = "test"; 
    private $dbName = "myDb"; 
    private $connection;

    private function __construct() {
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
        if ($this->connection->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
    }

    function __destruct() {
        $this->connection->close();
    }

    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new DatabaseConnectionProvider();
        }
        return self::$db->connection;
    }
}
?>