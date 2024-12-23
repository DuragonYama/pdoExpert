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

    public function saveFile($filename, $location) {
        $uniqueName = uniqid() . "_" . basename($filename['name']);
        $path = $location . $uniqueName;
        return $uniqueName ;
    }

    public function selectProducten() {
        $sql = "SELECT * from product";
        return $storeInfo = $this->pdo->execute($sql)->fetchAll();
        return [];
    }

    public function updateProduct($productID, $omschrijving, $prijs, $file) {
        $sql = "UPDATE product SET omschrijving = :omschrijving, prijs = :prijs, file = :file WHERE productID = :productID";
        $placeholder = ["productID" => $productID, "omschrijving" => $omschrijving, "prijs" => $prijs, "file" => $file];
        $this->pdo->execute($sql, $placeholder);
    }

    public function deleteProduct($productID) {
        $sql = "DELETE FROM product WHERE productID = :productID";
        $placeholder = ["productID" => $productID];
        $this->pdo->execute($sql, $placeholder);
    }
}

$Product = new Product();
?>