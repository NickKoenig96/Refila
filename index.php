<?php
session_start();
//var_dump($_SESSION['user']);

include_once(__DIR__ . "/classes/Products.php");
include_once(__DIR__ . "/classes/Users.php");


$PProducts = new Products();
$PProducts = $PProducts->getPopularProducts();

$RProducts = new Products();
$RProducts = $RProducts->getRecommendedProducts();


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

    <div class="indexBackground">
        <div class="sectionContainer">
            <a class="section leaderboard" href="stats.php">
                <div>
                    <p>LEADERBOARD</p>
                </div>
            </a>
            <a class="section stats" href="stats.php">
                <div>
                    <p>STATISTIEKEN</p>
                </div>
            </a>
            <a class="section earn" href="stats.php">
                <div>
                    <p>HOE FILAMENT VERDIENEN</p>
                </div>
            </a>
            <a class="section dMonth" href="design.php">
                <div>
                    <p>DESIGN VAN DE MAAND</p>
                </div>
            </a>
        </div>
    </div>




    <div class="indexSection">

        <h1>Populaire producten</h1>

        <div class="productsIndex">

            <?php foreach ($PProducts as $PProduct) : ?>
                <div>
                    <a class="section product" href="">
                        <div> <img src="./images/<?php echo htmlspecialchars($PProduct['image']) ?>" alt="">
                        </div>
                    </a>
                    <p class="productIndexTitle"><?php echo htmlspecialchars($PProduct['title']) ?></p>
                    <div class="priceProductIndex">

                        <img src="./images/filamentIcon.svg" alt="">
                        <p><?php echo htmlspecialchars($PProduct['price']) ?>/kg</p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>



    <div class="indexSection">

        <h1>Aanbevolen voor jou</h1>

        <div class="productsIndex">

        <?php foreach ($RProducts as $RProduct) : ?>
                <div>
                    <a class="section product" href="">
                        <div> <img src="./images/<?php echo htmlspecialchars($RProduct['image']) ?>" alt="">
                        </div>
                    </a>
                    <p class="productIndexTitle"><?php echo htmlspecialchars($RProduct['title']) ?></p>
                    <div class="priceProductIndex">

                        <img src="./images/filamentIcon.svg" alt="">
                        <p><?php echo htmlspecialchars($RProduct['price']) ?>/kg</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>



    <div class="indexSection">
        <a id="shopButton" href="">Shop</a>
    </div>


    </div>

    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>



</body>

</html>