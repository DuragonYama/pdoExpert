<?php 

require "db.php";

class Product {
    
    private $pdo;

    public function __construct() {
        $this->pdo = new Database();
    }

    public function insertProducten($omschrijving, $prijs, $file) {
        $sql = "INSERT INTO product (omschrijving, prijs, file) VALUES (:omschrijving, :prijs, :file)";
        $placeholder = ["omschrijving"=>$omschrijving, "prijs"=>$prijs, "file"=>$file];
        $this->pdo->execute($sql, $placeholder);
    }
}

$Product = new Product();
?>