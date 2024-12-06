<?php

class Database {
  
  private $pdo;

    public function __construct($db = "producten1", $user = "root", $pwd = "", $host = "localhost")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    public function execute($sql, $placeholder = NULL) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholder);
        return $stmt;
    }
}

$db = new Database();

?>