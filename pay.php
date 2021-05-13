<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
};

include_once(__DIR__ . "/classes/Users.php");
$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Refila</title>
</head>

<body>

    <div class="mobileNav">
        <?php include("./nav.inc.php") ?>
    </div>

    <div class="desktopNav">
        <?php include("./nav2.inc.php") ?>
    </div>

    <div class="line"></div>

    <div class="bestelling">
        <h1>Je bestelling is bevestigd</h1>
        <p>je kan je bestelling komen ophalen op het refila kantoor</p>
    </div>

    <div>
        <a class="btnPay" href="./shop.php">Verder winkelen</a>

    </div>

    <script src="js.js"></script>

    
</body>
</html>