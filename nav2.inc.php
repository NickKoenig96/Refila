<img class="desktopNavLogo" src="./images/logo.svg" alt="logo">

<div class="desktopNavLinks">
    <a href="index.php">Home</a>
    <a href="orders.php">Orders</a>
    <a href="stats.php">Stats</a>
    <a href="contact.php">Contact</a>
</div>

<div class="desktopNavCoins">
    <a href="shop.php">shop</a>
    <img class="desktopNavProfile" src="./images/<?php echo htmlspecialchars($users['image'])?>" alt="profilepic">
    <div class="coins">
        <img src="./images/filamentIcon.svg" alt="your coins">
        <p> <?php echo htmlspecialchars($users['coins'])?></p>
    </div>
</div>
