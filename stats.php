<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
};

include_once(__DIR__ . "/classes/Users.php");
include_once(__DIR__ . "/classes/Orders.php");



$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);

$top3users = new Users();
$top3users = $top3users->getTop3Users();

$top7users = new Users();
$top7users = $top7users->getTop7Users();
//var_dump($top7users);


$allUsers = new Users();
$allUsers = $allUsers->getAllUsers();
//var_dump($allUsers);

$account;
if ($users['account'] === 'printer') {
    //echo "printer";
    $account = 'printer';
} else {
    //echo 'horeca';
    $account = 'horeca';
}

//3D printers

$totalCoins = new Users();
$totalCoin = $totalCoins->getTotalCoins($_SESSION['user']);

$MaxIncomes = new Orders();
$MaxIncome = $MaxIncomes->getMaxIncome($_SESSION['user']);

$totalOrders = new Orders();
$totalOrder = $totalOrders->getAllCompletePrinterOrdersCount($_SESSION['user']);

$totalOrdersMonth = new Orders();
$totalOrderMonth = $totalOrdersMonth->getAllmonthCoinsPrinter(date(" F "),$_SESSION['user']);

$amountOrdersMonth = new Orders();
$amountOrderMonth = $amountOrdersMonth->getAllCompleteOrdersPrintersMonth(date(" F "),$_SESSION['user']);

$MaxMonths = new Orders();
$MaxMonth = $MaxMonths->getMaxIncomePrintersMonth(date(" F "),$_SESSION['user']);
//var_dump($MaxMonth[0]["Max(price)"]);

// Horeca 


$MaxIncomesH = new Orders();
$MaxIncomeH = $MaxIncomes->getMaxIncomeH($_SESSION['user']);

$totalOrdersH = new Orders();
$totalOrderH = $totalOrdersH->getAllCompleteHorecaOrdersCount($_SESSION['user']);

$totalOrdersMonthH = new Orders();
$totalOrderMonthH = $totalOrdersMonthH->getAllmonthCoinsHoreca(date(" F "),$_SESSION['user']);

$amountOrdersMonthH = new Orders();
$amountOrderMonthH = $amountOrdersMonthH->getAllCompleteOrdersHorecaMonth(date(" F "),$_SESSION['user']);

$MaxMonths = new Orders();
$MaxMonthH = $MaxMonths->getMaxIncomeHorecaMonth(date(" F "),$_SESSION['user']);


//rating Printer

$ratingsPrinter = new Orders();
$ratingPrinter = $ratingsPrinter->averageRatingPrinter($_SESSION['user']);

$ratingsPrinterC = new Orders();
$ratingPrinterC = $ratingsPrinterC->averageRatingPrinterC($_SESSION['user']);

$ratingsPrinterC5 = new Orders();
$ratingPrinterC5 = $ratingsPrinterC5->averageRatingPrinterC5($_SESSION['user']);

$ratingsPrinterC4 = new Orders();
$ratingPrinterC4 = $ratingsPrinterC4->averageRatingPrinterC4($_SESSION['user']);

$ratingsPrinterC3 = new Orders();
$ratingPrinterC3 = $ratingsPrinterC3->averageRatingPrinterC3($_SESSION['user']);

$ratingsPrinterC2 = new Orders();
$ratingPrinterC2 = $ratingsPrinterC2->averageRatingPrinterC2($_SESSION['user']);

$ratingsPrinterC1 = new Orders();
$ratingPrinterC1 = $ratingsPrinterC1->averageRatingPrinterC1($_SESSION['user']);

//rating Printer

$ratingsHoreca = new Orders();
$ratingHoreca = $ratingsHoreca->averageRatingHoreca($_SESSION['user']);

$ratingsHorecaC = new Orders();
$ratingHorecaC = $ratingsHorecaC->averageRatingHorecaC($_SESSION['user']);

$ratingsHorecaC5 = new Orders();
$ratingHorecaC5 = $ratingsHorecaC5->averageRatingHorecaC5($_SESSION['user']);

$ratingsHorecaC4 = new Orders();
$ratingHorecaC4 = $ratingsHorecaC4->averageRatingHorecaC4($_SESSION['user']);

$ratingsHorecaC3 = new Orders();
$ratingHorecaC3 = $ratingsHorecaC3->averageRatingHorecaC3($_SESSION['user']);

$ratingsHorecaC2 = new Orders();
$ratingHorecaC2 = $ratingsHorecaC2->averageRatingHorecaC2($_SESSION['user']);
var_dump($ratingHorecaC2);

$ratingsHorecaC1 = new Orders();
$ratingHorecaC1 = $ratingsHorecaC1->averageRatingHorecaC1($_SESSION['user']);



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

    <div class="ordersContainer">

        <h2>Your Stats</h2>

        <div class="statsCard">
            <div class="yourStats">
                <h3 class="statsH3">AANTAL FILAMENT VERDIEND:</h3>
                <div class="statsCoins">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <p class="statsCoins"><?php echo htmlspecialchars($totalCoin['totalCoins'])?></p>
                </div>
                <div class="statsLine"></div>
            </div>
            <div class="yourStats">
                <h3 class="statsH3">AANTAL ORDERS VOLTOOID:</h3>
                <div class="statsCoins">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <?php if($account === 'printer'):?>
                    <p class="statsCoins"><?php echo htmlspecialchars($totalOrder['COUNT(*)'])?></p>
                    <?php endif;?>
                    <?php if($account === "horeca"):?>
                        <p class="statsCoins"><?php echo htmlspecialchars($totalOrderH['COUNT(*)'])?></p>
                        <?php endif;?>
                </div>
                <div class="statsLine"></div>
            </div>
            <div class="yourStats">
            <?php if($account === 'printer'):?>
                <h3 class="statsH3">GROOTSTE ORDER INKOMST</h3>
                <?php endif;?>
                <?php if($account === 'horeca'):?>
                <h3 class="statsH3">GROOTSTE ORDER UITGAVE</h3>
                <?php endif;?>

                <div class="statsCoins">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <?php if($account === 'printer'):?>
                    <p class="statsCoins"><?php echo htmlspecialchars($MaxIncome[0]["Max(price)"])?></p>
                    <?php endif;?>
                    <?php if($account === "horeca"):?>
                        <p class="statsCoins"><?php echo htmlspecialchars($MaxIncomeH[0]["Max(price)"])?></p>
                        <?php endif;?>
                </div>
                <div class="statsLine"></div>
            </div>
            <div class="yourStats">
            <?php if($account === 'printer'):?>
                <h3 class="statsH3">AANTAL FILAMENT VERDIEND <?php  echo date(" F ")?>:</h3>
                <?php endif;?>
                <?php if($account === 'horeca'):?>
                <h3 class="statsH3">AANTAL FILAMENT BETAALD <?php  echo date(" F ")?>:</h3>
                <?php endif;?>

                <div class="statsCoins">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <?php if($account === 'printer'):?>
                    <p class="statsCoins"><?php echo htmlspecialchars($totalOrderMonth)?></p>
                    <?php endif;?>
                    <?php if($account === "horeca"):?>
                        <p class="statsCoins"><?php echo htmlspecialchars($totalOrderMonthH)?></p>
                        <?php endif;?>
                </div>
                <div class="statsLine"></div>
            </div>
            <div class="yourStats">
                <h3 class="statsH3">AANTAL Orders FEB VOLTOOID:</h3>
                <div class="statsCoins">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <?php if($account === 'printer'):?>
                    <p class="statsCoins"><?php echo htmlspecialchars($amountOrderMonth[0]['COUNT(*)'])?></p>
                    <?php endif;?>
                    <?php if($account === "horeca"):?>
                        <p class="statsCoins"><?php echo htmlspecialchars($amountOrderMonthH[0]['COUNT(*)'])?></p>
                        <?php endif;?>
                </div>
                <div class="statsLine"></div>
            </div>
            <div class="yourStats">
            <?php if($account === 'printer'):?>
                <h3 class="statsH3">GROOTSTE ORDER INKOMST FEB:</h3>
                <?php endif;?>
                <?php if($account === "horeca"):?>
                    <h3 class="statsH3">GROOTSTE ORDER UITGAVE FEB:</h3>
                    <?php endif;?>
                <div class="statsCoins">
                    <img src="./images/filamentIcon.svg" alt="filamentIcon">
                    <?php if($account === 'printer'):?>
                    <p class="statsCoins"><?php echo htmlspecialchars($MaxMonth[0]["Max(price)"])?></p>
                    <?php endif;?>
                    <?php if($account === "horeca"):?>
                        <p class="statsCoins"><?php echo htmlspecialchars($MaxMonthH[0]["Max(price)"])?></p>
                        <?php endif;?>
                </div>
                <div class="statsLine"></div>
            </div>
        </div>
    </div>





    <h2>Your Rating</h2>

    <div class="statsCard">
        <div class="ratings">
        <?php if($account ==="printer"):?>
            <h3>AVERAGE RATING: <?php echo htmlspecialchars($ratingPrinter[0]["AVG(rating)"])?></h3>
            <p>(<?php echo htmlspecialchars($ratingPrinterC[0]["COUNT(*)"])?> Ratings)</p>
<?php endif;?>

<?php if($account ==="horeca"):?>
            <h3>AVERAGE RATING: <?php echo htmlspecialchars($ratingHoreca[0]["AVG(rating)"])?></h3>
            <p>(<?php echo htmlspecialchars($ratingHorecaC[0]["COUNT(*)"])?> Ratings)</p>
<?php endif;?>
            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <?php if($account ==="printer"):?>
                <p> <?php echo htmlspecialchars($ratingPrinterC5[0]["COUNT(*)"])?> </p>
                <?php endif;?>
                <?php if($account ==="horeca"):?>
                <p> <?php echo htmlspecialchars($ratingHorecaC5[0]["COUNT(*)"])?> </p>
                <?php endif;?>

            </div>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <?php if($account ==="printer"):?>
                <p> <?php echo htmlspecialchars($ratingPrinterC4[0]["COUNT(*)"])?> </p>
                <?php endif;?>
                <?php if($account ==="horeca"):?>
                <p> <?php echo htmlspecialchars($ratingHorecaC4[0]["COUNT(*)"])?> </p>
                <?php endif;?>            </div>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <?php if($account ==="printer"):?>
                <p> <?php echo htmlspecialchars($ratingPrinterC3[0]["COUNT(*)"])?> </p>
                <?php endif;?>
                <?php if($account ==="horeca"):?>
                <p> <?php echo htmlspecialchars($ratingHorecaC3[0]["COUNT(*)"])?> </p>
                <?php endif;?>            </div>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">

                <?php if($account ==="printer"):?>
                <p> <?php echo htmlspecialchars($ratingPrinterC2[0]["COUNT(*)"])?> </p>
                <?php endif;?>
                <?php if($account ==="horeca"):?>
                <p> <?php echo htmlspecialchars($ratingHorecaC2[0]["COUNT(*)"])?> </p>
                <?php endif;?>            
                </div>

            <div>

                <img src="./images/star.svg" alt="star">
                <?php if($account ==="printer"):?>
                <p> <?php echo htmlspecialchars($ratingPrinterC1[0]["COUNT(*)"])?> </p>
                <?php endif;?>
                <?php if($account ==="horeca"):?>
                <p> <?php echo htmlspecialchars($ratingHorecaC1[0]["COUNT(*)"])?> </p>
                <?php endif;?>
            </div>


        </div>

    </div>
    </div>



  <!--  <h2>Global stats</h2>

    <div class="statsCard">
        <div class="yourStats">
            <h3 class="statsH3">AANTAL FILAMENT VERDIEND:</h3>
            <div class="statsCoins">
                <img src="./images/filamentIcon.svg" alt="filamentIcon">
                <p class="statsCoins">60.000</p>
            </div>
            <div class="statsLine"></div>
        </div>
        <div class="yourStats">
            <h3 class="statsH3">AANTAL ORDERS VOLTOOID:</h3>
            <div class="statsCoins">
                <img src="./images/filamentIcon.svg" alt="filamentIcon">
                <p class="statsCoins">3</p>
            </div>
            <div class="statsLine"></div>
        </div>
        <div class="yourStats">
            <h3 class="statsH3">GROOTSTE ORDER INKOMST</h3>
            <div class="statsCoins">
                <img src="./images/filamentIcon.svg" alt="filamentIcon">
                <p class="statsCoins">60.000</p>
            </div>
            <div class="statsLine"></div>
        </div>
        <div class="yourStats">
            <h3 class="statsH3">AANTAL FILAMENT VERDIEND FEB:</h3>
            <div class="statsCoins">
                <img src="./images/filamentIcon.svg" alt="filamentIcon">
                <p class="statsCoins">60.000</p>
            </div>
            <div class="statsLine"></div>
        </div>
        <div class="yourStats">
            <h3 class="statsH3">AANTAL Orders FEB VOLTOOID:</h3>
            <div class="statsCoins">
                <img src="./images/filamentIcon.svg" alt="filamentIcon">
                <p class="statsCoins">60.000</p>
            </div>
            <div class="statsLine"></div>
        </div>
        <div class="yourStats">
            <h3 class="statsH3">GROOTSTE ORDER INKOMST FEB:</h3>
            <div class="statsCoins">
                <img src="./images/filamentIcon.svg" alt="filamentIcon">
                <p class="statsCoins">5</p>
            </div>
            <div class="statsLine"></div>
        </div>
    </div>
    </div>
-->

    <div class="ordersContainer">
        <div class="leaderboardStats">
            <h4>LEADERBOARD</h4>
            <p>De top 10 printers van Refila</p>

            <div class="winners">
            <?php foreach($top3users as $top3user):?>
                <div class="top3">
                    <p><?php echo htmlspecialchars($top3user['username'])?></p>
                    <img src="./images/<?php echo htmlspecialchars($top3user['image'])?>" alt="">
                    <p><?php echo htmlspecialchars($top3user['coins'])?></p>
                </div>
                <?php endforeach;?>

                
            </div>

            <div class="winnersList">
            <?php for($i = 3; $i < count($top7users); ++$i):?>
                <div class="winnersListItem">
                    <p><?php echo htmlspecialchars($i)?></p>
                    <p class="nameRatings"><?php echo htmlspecialchars($top7users[$i]['username'])?></p>
                    <div class="winnersCoins"><img src="./images/filamentIcon.svg" alt="filament">
                        <p><?php echo htmlspecialchars($top7users[$i]['coins'])?></p>
                    </div>

                </div>
<?php endfor;?>

        

            </div>



        </div>

    </div>




    <h3 class="howtoH3">Hoe filament verdienen?</h3>


    <div class="howTo">

        <div>

            <p>Je kan filament verdienen door orders van de horeca aan te
                nemen. Op de pagina ‘orders’ zie je alle orders die je kan
                aannemen als je een 3d printer in bezit hebt. Er staat exact
                welk materiaal je moet gebruiken, welke kleur het product
                moet hebben en het aantal.
            </p>

            <p>Bij sommige orders wordt er ook verwacht dat je het logo van
                de horecazaak erop print. Dit logo kan je downloaden bij de
                order.</p>

        </div>

        <div>
            <p>Als je de order af hebt moet je dit op de orderpagina laten
                weten door op de knop ‘markeren als klaar’ te drukken. Of
                wel moet je het afgewerkt product zelf brengen naar de zaak,
                ofwel komt iemand het bij je ophalen.
            </p>

            <p>
                Als de horecazaak het product in ontvangst hebben genomen
                krijg je punten op dit platform. Als je genoeg punten hebt,
                kun je met die punten filament kopen in de shop.
            </p>
        </div>



    </div>


    </div>

    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

</body>

</html>