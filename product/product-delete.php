<?php 
require "../includes/product.php";
if ($_GET['id']) {
    $Product->deleteProduct($_GET['id']);
    echo "Dit product is verwijdert!";
    header("refresh: 3, product-view.php");
} else {
    echo "Er is een fout!";
}
?>