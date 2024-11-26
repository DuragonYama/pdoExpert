<?php
require "../includes/product.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $file = $_FILES['file'];

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $fileName = basename($file['name']);
    $uploadFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
        $Product->insertProducten($omschrijving, $prijs, $uploadFilePath);
        echo "Product successfully added!";
        header("refresh: 3, ../user/insert-user.php");
    } else {
        echo "Failed to upload the file.";
    }
} else {
    echo "Invalid request.";
}
?>
