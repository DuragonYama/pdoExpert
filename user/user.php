<?php 

require "../includes/user-class.php";

if (isset($_POST['uitlogKnop'])) {
    $User->uitloggen();
    echo "Logging out";
    header('refresh: 3, url = login-user.php');
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
    <form  method="POST">
        <input type="submit" value="uitloggen" name="uitlogKnop">
    </form>
</body>
</html>