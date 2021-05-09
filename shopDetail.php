<?php
session_start();

include_once(__DIR__ . "/classes/Users.php");
include_once(__DIR__ . "/classes/Products.php");


$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);

$productP = new Products();
$productP = $productP->getProductPById($_GET['id']);
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

    <div class="detailShop">

        <div class="detailShopProduct">
            <div class="detailShopProductP1">
                <div class="detailShopProductF">
                    <img src="images/<?php echo htmlspecialchars($productP[0]['image']) ?>" alt="filament">
                </div>
            </div>

            <div class="detailShopProductP1">
                <div class="detailShopProductInfo">
                    <h1><?php echo htmlspecialchars($productP[0]['title']) ?></h1>
                    <div class="shopDetailFilament">
                        <img src="./images/filamentIcon.svg" alt="filamentIcon">
                        <p><?php echo htmlspecialchars($productP[0]['price']) ?>/kg</p>
                    </div>
                </div>

                <div class="detailShopProductInfoExtra">

                    <div>
                        <p class="shopDetailBold">BESCHRIJVING:</p>
                        <p><?php echo htmlspecialchars($productP[0]['description']) ?></p>

                    </div>



                </div>


                <div class="shopDeatailForm">
                    <form action="" method="POST">
                        <div class="shopDetailFormMargin">
                            <label id="loginLabel" for="amount">Hoeveelheid</label>
                            <select name="amount" id="">
                                <option value="1">1kg filament</option>
                                <option value="5">5kg filament</option>
                                <option value="10">10kg filament</option>
                            </select>
                        </div>


                        <hr>

                        <a class="linkDetail" href="pay.php"> <input class="ordersSubmit" value="Betalen"></a>

                    </form>
                </div>


            </div>



        </div>


    </div>

    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

</body>

</html>