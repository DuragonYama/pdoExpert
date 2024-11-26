<?php 

require "db.php";

class User {
    
    private $pdo;

    public function __construct() {
        $this->pdo = new Database();
    }

    public function register($naam, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (naam, email, password) VALUES (:name, :email, :password)";
        $placeholder = ["name"=>$naam, "email"=>$email, "password"=>$hash];
        $this->pdo->execute($sql, $placeholder);
    }

    public function login($email, $password) {
        session_start();
        $sql = "SELECT * FROM user WHERE email = :email";
        $storeInfo = $this->pdo->execute($sql, ["email" => $email])->fetch();

        if (!$storeInfo) {
            echo "Dit email wordt niet gebruikt";
            return false;
        } 

        if (password_verify($password, $storeInfo['password'])) {
            $_SESSION['name'] = $storeInfo['naam'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            return true;
        } else {
            echo "Onjuist wachtwoord";
            return false;
        }
    }

    public function uitloggen() {
        session_unset();
        session_destroy();
    }

    public function insertProducten($omschrijving, $prijs, $file) {
        $sql = "INSERT INTO product (omschrijving, prijs, file) VALUES (:omschrijving, :prijs, :file)";
        $placeholder = ["omschrijving"=>$omschrijving, "prijs"=>$prijs, "file"=>$file];
        $this->pdo->execute($sql, $placeholder);
    }
}

$User = new User();
?>