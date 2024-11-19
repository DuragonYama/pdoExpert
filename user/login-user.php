<?php 
    require "../includes/user-class.php";

    if (isset($_POST['knop1'])) {
        $User->login($_POST['email'], $_POST['password']);
        echo "Login gelukt!";
        header('refresh: 3, url = user.php');
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
    <form method="POST">
        <input type="email" name="email" placeholder="Uw email" required> <br>
        <input type="password" name="password" placeholder="Uw wachtwoord" required> <br><br>
        <input type="submit" name="knop1">
    </form>
</body>
</html>