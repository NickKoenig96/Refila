<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
};

include_once(__DIR__ . "/classes/Users.php");
include_once(__DIR__ . "/classes/Products.php");
include_once(__DIR__ . "/classes/Orders.php");



$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);


$productP = new Products();
$productP = $productP->getProductPById($_GET['id']);


if(!empty($_POST['orderSubmit'])){
$baseprice = $_POST['price'];
$price = $baseprice *  $_POST['amount'];

if($users['coins']> $price){
    $order = new Orders();
    $order->insertProduct($_POST['type'], $_POST['horeca'],$_POST['description'], $_POST['amount'], $_POST['deadline'],$_POST['Verzenden'], $price, $_POST['horecamail'], date(" F "));
    
    $updateCoinsHoreca = new Users();
    $updateCoinHoreca  = $updateCoinsHoreca->updateCoinsH($_SESSION['user'], $price);
    
    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 0.01; URL=$url1");
}else{
    $message ="Je hebt niet genoeg coins voor deze bestelling. koop of verdien coins om dit product te kunnen kopen";
}


}


$date = date("d-m-y");
$date1 = str_replace( '/', $date);
$tomorrow = date('d-m-Y',strtotime($date1 . "+14 days"));

$month = date(" F ");


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

    <div class="error">
        <p><?php if (isset($message)) : ?>
                    <?php echo htmlspecialchars($message) ?>
                <?php endif; ?>
        </div>

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
                                <option value="10">10 stuks</option>
                                <option value="50">50 stuks</option>
                                <option value="100">100 stuks</option>
                            </select>
                        </div>

                        
                        <div class="shopDetailFormRadio">
                            <input type="radio" id="" name="Verzenden" value="ophalen">
                            <label for="ophalen">Ophalen</label><br>
                            <input type="radio" id="" name="Verzenden" value="Verzenden">
                            <label for="Verzenden">Verzenden</label><br>
                            </div>
                            <input type="hidden" name="type" value="notA">
                            <input type="hidden" name="horeca" value="<?php echo htmlspecialchars($users['username'])?>">
                            <input type="hidden" name="description" value="<?php echo htmlspecialchars($productP[0]['description'])?>">
                            <input type="hidden" name="deadline" value="<?php echo htmlspecialchars($tomorrow)?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($productP[0]['price'])?>">
                            <input type="hidden" name="horecamail" value="<?php echo htmlspecialchars($_SESSION['user'])?>">
                            <input type="hidden" name="month" value="<?php echo htmlspecialchars($month)?>">

                        <hr>

                     <input type="submit" class="ordersSubmit" value="Betalen" name="orderSubmit">

                    </form>
                    <p  class='inform'>Let op ! prijs wordt pas van je coins afgetrokken nadat het order voltooid is en door u opgehaald en bevestigd.</p>

                </div>


            </div>



        </div>


    </div>

    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

</body>

</html>