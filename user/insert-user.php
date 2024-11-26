<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../product/product-insert.php" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="omschrijving" name="omschrijving" required> <br>
        <input type="number" placeholder="Prijs per stuk" name="prijs" required> <br>
        <input type="file" name="file" required> <br> <br>
        <input type="submit" name="knop">
    </form>
</body>
</html>