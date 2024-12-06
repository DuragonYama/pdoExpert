<?php

require "../includes/product.php";
$producten = $Product->selectProducten();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten Lijst</title>
</head>
<body>
    <h1>Producten Lijst</h1>
    <table border="1">
        <tr>
            <th>Omschrijving</th>
            <th>Prijs</th>
            <th>Bestand</th>
        </tr>
        <?php foreach ($producten as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['omschrijving']); ?></td>
            <td>€<?= htmlspecialchars($product['prijs']); ?></td>
            <td><img src="<?= htmlspecialchars($product['file']); ?>" alt="Afbeelding niet beschikbaar" width="50"></td>
            <td>
                <a href="product-edit.php?id=<?= htmlspecialchars($product['productID']); ?>">Edit</a> |
                <a href="product-delete.php?id=<?= htmlspecialchars($product['productID']); ?>" onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
