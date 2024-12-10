<?php 
    require "../includes/product.php";

    if (isset($_POST['knop'])) {
        $omschrijving = $_POST['omschrijving'];
        $prijs = $_POST['prijs'];
        $file = $_FILES['file'];
    
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileName = $Product->saveFile($file, $uploadDir);
        $uploadFilePath = $uploadDir . $fileName;
    
        if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            $Product->updateProduct($_GET['id'], $omschrijving, $prijs, $uploadFilePath);
            echo "Product successfully updated!";
            header("refresh: 3, ../product/product-view.php");
        } else {
            echo "Failed to update the file.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="omschrijving" name="omschrijving" required> <br>
        <input type="number" placeholder="Prijs per stuk" name="prijs" required> <br>
        <input type="file" name="file" required> <br> <br>
        <input type="submit" name="knop">
    </form>
</body>
</html>