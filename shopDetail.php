<?php
session_start();

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

    <div class="detailShop">

        <div class="detailShopProduct">
            <div class="detailShopProductP1">
                <div class="detailShopProductF">
                    <img src="images/filamentProduct.svg" alt="filament">
                </div>
            </div>

            <div class="detailShopProductP1">
                <div class="detailShopProductInfo">
                    <h1>Multicolor PLA 3D Printer Filament</h1>
                    <div class="shopDetailFilament">
                        <img src="./images/filamentIcon.svg" alt="filamentIcon">
                        <p>60.00/kg</p>
                    </div>
                </div>

                <div class="detailShopProductInfoExtra">

                    <div>
                        <div>
                            <p class="shopDetailBold">LAND VAN HERKOMST:</p>
                            <p>India</p>
                        </div>
                    </div>

                    <div>
                        <div>
                            <p class="shopDetailBold">LAND VAN HERKOMST:</p>
                            <p>Sparrow Softtech</p>
                        </div>
                    </div>

                    <div>
                        <div>
                            <p class="shopDetailBold">LAND VAN HERKOMST:</p>
                            <p>India</p>
                        </div>
                    </div>

                    <div>
                        <div>
                            <p class="shopDetailBold">LAND VAN HERKOMST:</p>
                            <p>India</p>
                        </div>
                    </div>

                    <div>
                        <div>
                            <p class="shopDetailBold">LAND VAN HERKOMST:</p>
                            <p>India</p>
                        </div>
                    </div>

                    <div>
                        <div>
                            <p class="shopDetailBold">LAND VAN HERKOMST:</p>
                            <p>India</p>
                        </div>
                    </div>

                </div>


                <div class="shopDeatailForm">
                    <form action="" method="POST">
                        <div class="shopDetailFormMargin">
                            <label id="loginLabel" for="amount">Hoeveelheid</label>
                            <select name="amount" id="">
                                <option value="1kg">1kg filament</option>
                                <option value="5kg">5kg</option>
                                <option value="10kg">10kg</option>
                            </select>
                        </div>


                        <hr>

                        <input class="ordersSubmit" type="submit" value="Betalen">

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