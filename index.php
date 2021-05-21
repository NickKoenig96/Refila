<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
};

include_once(__DIR__ . "/classes/Products.php");
include_once(__DIR__ . "/classes/Users.php");


$PProductsP = new Products();
$PProductsP = $PProductsP->getPopularProductsP();

$PProductsH = new Products();
$PProductsH = $PProductsH->getPopularProductsH();

$RProductsP = new Products();
$RProductsP = $RProductsP->getRecommendedProductsP();

$RProductsH = new Products();
$RProductsH = $RProductsH->getRecommendedProductsH();


$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);
$account;
if ($users['account'] === 'printer') {
    $account = 'printer';
} else {
    $account = 'horeca';
}

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
    <?php if($account === "printer"):?>


        <h1>Populaire producten</h1>

        <div class="productsIndex">

            <?php foreach ($PProductsP as $PProductP) : ?>
                <div>
                    <a class="section product" href="shop.php">
                        <div> <img src="./images/<?php echo htmlspecialchars($PProductP['image']) ?>" alt="">
                        </div>
                    </a>
                    <p class="productIndexTitle"><?php echo htmlspecialchars($PProductP['title']) ?></p>
                    <div class="priceProductIndex">

                        <img src="./images/filamentIcon.svg" alt="">
                        <p><?php echo htmlspecialchars($PProductP['price']) ?>/kg</p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php endif;?>

        <?php if($account === "horeca"):?>


<h1>Populaire producten</h1>

<div class="productsIndex">

    <?php foreach ($PProductsH as $PProductH) : ?>
        <div>
            <a class="section product" href="shop.php">
                <div> <img src="./images/<?php echo htmlspecialchars($PProductH['image']) ?>" alt="">
                </div>
            </a>
            <p class="productIndexTitle"><?php echo htmlspecialchars($PProductH['title']) ?></p>
            <div class="priceProductIndex">

                <img src="./images/filamentIcon.svg" alt="">
                <p><?php echo htmlspecialchars($PProductH['price']) ?>/kg</p>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php endif;?>


    </div>



    <div class="indexSection">
    <?php if($account === "printer"):?>


        <h1>Aanbevolen voor jou</h1>

        <div class="productsIndex">

            <?php foreach ($RProductsP as $RProductP) : ?>
                <div>
                    <a class="section product" href="shop.php">
                        <div> <img src="./images/<?php echo htmlspecialchars($RProductP['image']) ?>" alt="">
                        </div>
                    </a>
                    <p class="productIndexTitle"><?php echo htmlspecialchars($RProductP['title']) ?></p>
                    <div class="priceProductIndex">

                        <img src="./images/filamentIcon.svg" alt="">
                        <p><?php echo htmlspecialchars($RProductP['price']) ?>/kg</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <?php endif;?>

    <?php if($account === "horeca"):?>


<h1>Aanbevolen voor jou</h1>

<div class="productsIndex">

    <?php foreach ($RProductsH as $RProductH) : ?>
        <div>
            <a class="section product" href="shop.php">
                <div> <img src="./images/<?php echo htmlspecialchars($RProductH['image']) ?>" alt="">
                </div>
            </a>
            <p class="productIndexTitle"><?php echo htmlspecialchars($RProductH['title']) ?></p>
            <div class="priceProductIndex">

                <img src="./images/filamentIcon.svg" alt="">
                <p><?php echo htmlspecialchars($RProductH['price']) ?>/kg</p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</div>
<?php endif;?>


    <div class="indexSection">
        <a id="shopButton" href="shop.php">Shop</a>
    </div>


    </div>

    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>


<script src="js.js"></script>
</body>

</html>