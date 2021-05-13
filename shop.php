<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
};


include_once(__DIR__ . "/classes/Users.php");
include_once(__DIR__ . "/classes/Products.php");


$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);

$account;
if ($users['account'] === 'printer') {
    echo "printer";
    $account = 'printer';
} else {
     echo 'horeca';
    $account = 'horeca';
}


$productsP = new Products();
$productsP = $productsP->getAllProductsP();

$PProductsP = new Products();
$PProductsP = $PProductsP->getPopularProductsP();

$RProductsP = new Products();
$RProductsP = $RProductsP->getRecommendedProductsP();





$productsH = new Products();
$productsH = $productsH->getAllProductsH();

$PProductsH = new Products();
$PProductsH = $PProductsH->getPopularProductsH();

$RProductsH = new Products();
$RProductsH = $RProductsH->getRecommendedProductsH();

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

    <div class="shop">
        <h3 class="shopH3">Popoluaire producten</h3>

        <div class="shopContainer">
<?php if($account === "printer"):?>
        <?php foreach($PProductsP as $PProductP):?>
        <a class="shopLink" href="shopDetail.php?id=<?php echo htmlspecialchars($PProductP['id'])?>">
        <div class="shopProduct">
                <div class="shopProductImage">
                    <img src="./images/<?php echo htmlspecialchars($PProductP['image'])?>" alt="filament">
                </div>
                <p class="shopProductP"><?php echo htmlspecialchars($PProductP['title'])?></p>
                <div class="shopFilament">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p><?php echo htmlspecialchars($PProductP['price'])?></p>
                </div>
            </div>
        </a>
       <?php endforeach;?>
<?php endif;?>

<?php if($account === "horeca"):?>
        <?php foreach($PProductsH as $PProductH):?>
        <a class="shopLink" href="shopDetailHoreca.php?id=<?php echo htmlspecialchars($PProductH['id'])?>">
        <div class="shopProduct">
                <div class="shopProductImage">
                    <img src="./images/<?php echo htmlspecialchars($PProductH['image'])?>" alt="filament">
                </div>
                <p class="shopProductP"><?php echo htmlspecialchars($PProductH['title'])?></p>
                <div class="shopFilament">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p><?php echo htmlspecialchars($PProductH['price'])?></p>
                </div>
            </div>
        </a>
       <?php endforeach;?>
<?php endif;?>

        </div>


        <h3 class="shopH3">Aanbevolen voor jou</h3>

        <div class="shopContainer">
        <?php if($account === "printer"):?>
        <?php foreach($RProductsP as $RProductP):?>
        <a class="shopLink" href="shopDetail.php?id=<?php echo htmlspecialchars($RProductP['id'])?>">
        <div class="shopProduct">
                <div class="shopProductImage">
                    <img src="./images/<?php echo htmlspecialchars($RProductP['image'])?>" alt="filament">
                </div>
                <p class="shopProductP"><?php echo htmlspecialchars($RProductP['title'])?></p>
                <div class="shopFilament">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p><?php echo htmlspecialchars($RProductP['price'])?></p>
                </div>
            </div>
        </a>
       <?php endforeach;?>
       <?php endif;?>


       <?php if($account === "horeca"):?>
        <?php foreach($RProductsH as $RProductH):?>
        <a class="shopLink" href="shopDetailHoreca.php?id=<?php echo htmlspecialchars($RProductH['id'])?>">
        <div class="shopProduct">
                <div class="shopProductImage">
                    <img src="./images/<?php echo htmlspecialchars($RProductH['image'])?>" alt="filament">
                </div>
                <p class="shopProductP"><?php echo htmlspecialchars($RProductH['title'])?></p>
                <div class="shopFilament">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p><?php echo htmlspecialchars($RProductH['price'])?></p>
                </div>
            </div>
        </a>
       <?php endforeach;?>
       <?php endif;?>

        </div>


        <h3 class="shopH3">Alle producten</h3>

        <div class="shopContainer">
        <?php if($account === "printer"):?>
        <?php foreach($productsP as $productP):?>
        <a class="shopLink" href="shopDetail.php?id=<?php echo htmlspecialchars($productP['id'])?>">
        <div class="shopProduct">
                <div class="shopProductImage">
                    <img src="./images/<?php echo htmlspecialchars($productP['image'])?>" alt="filament">
                </div>
                <p class="shopProductP"><?php echo htmlspecialchars($productP['title'])?></p>
                <div class="shopFilament">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p><?php echo htmlspecialchars($productP['price'])?></p>
                </div>
            </div>
        </a>
       <?php endforeach;?>
       <?php endif;?>

       <?php if($account === "horeca"):?>
        <?php foreach($productsH as $productH):?>
        <a class="shopLink" href="shopDetailHoreca.php?id=<?php echo htmlspecialchars($productH['id'])?>">
        <div class="shopProduct">
                <div class="shopProductImage">
                    <img src="./images/<?php echo htmlspecialchars($productH['image'])?>" alt="filament">
                </div>
                <p class="shopProductP"><?php echo htmlspecialchars($productH['title'])?></p>
                <div class="shopFilament">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p><?php echo htmlspecialchars($productH['price'])?></p>
                </div>
            </div>
        </a>
       <?php endforeach;?>
       <?php endif;?>

        </div>




    </div>

    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

    <script src="js.js"></script>


</body>

</html>