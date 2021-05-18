<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
};

//var_dump($_SESSION['user']);

include_once(__DIR__ . "/classes/Users.php");
include_once(__DIR__ . "/classes/Orders.php");


$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);

$allUsers = new Users();
$allUsers = $allUsers->getAllUsers();
//var_dump($allUsers);

$UserHorecaTotalCoins = new Users();
$UserHorecaTotalCoin = $UserHorecaTotalCoins->totalCoinsH($_SESSION['user']);



$ordersA = new Orders();
$orderA = $ordersA->getAllActivePrinter($_SESSION['user']);

$ordersAW = new Orders();
$orderAW = $ordersAW->getAllAwaitingPrinter($_SESSION['user']);

$ordersHA = new Orders();
$orderHA = $ordersHA->getAllActiveHoreca($_SESSION['user']);


$ordersNA = new Orders();
$orderNA = $ordersNA->getAllNotActivePrinter();

$ordersC = new Orders();
$orderC = $ordersC->getAllCompletedPrinter($_SESSION['user']);

$ordersRS = new Orders();
$orderRS = $ordersRS->getAllReadyShipement($_SESSION['user']);

$ordersHC = new Orders();
$orderHC = $ordersHC->getAllcompleteHorecaOrders($_SESSION['user']);

$ordersAmount = new Orders();
$orderAmount = $ordersAmount->getActiveOrdersAmount($_SESSION['user']);

$ordersAmountHoreca = new Orders();
$orderAmountHoreca = $ordersAmountHoreca->getActiveOrdersAmountHoreca($_SESSION['user']);


$account;
if ($users['account'] === 'printer') {
    //echo "printer";
    $account = 'printer';
} else {
    // echo 'horeca';
    $account = 'horeca';
}





if (!empty($_POST['orderDoneSubmit'])) {
    $updateActiveOrders = new Orders();
    $updateActiveOrder = $updateActiveOrders->completeOrder($_SESSION['user'], $_POST['orderDone']);


    header('Location: orders.php');
}

if (!empty($_POST['ordersAcceptSubmit'])) {
    $AcceptOrders = new Orders();
    $AcceptOrder = $AcceptOrders->AcceptOrder($_SESSION['user'], $_POST['ordersAccept']);

    header('Location: orders.php');

}else


if (!empty($_POST['ordersReceivedSubmit'])) {
        $orderReceived = new Orders();
        $orderReceived = $orderReceived->ReceiveOrder($_SESSION['user'], $_POST['ordersReceived']);
    
        $updateCoinsPrinter = new Users();
        $updateCoinPrinter  = $updateCoinsPrinter->updateCoins($_POST['printermail'], $_POST['price']);
    
       /* $updateCoinsHoreca = new Users();
        $updateCoinHoreca  = $updateCoinsHoreca->updateCoinsH($_SESSION['user'], $_POST['price']);*/
    
    
    
        header('Location: orders.php');
   
   
}


if (!empty($_POST['submitRating'])) {



    $ratingsHoreca = new Orders();
    $ratingHoreca  = $ratingsHoreca->addHorecaRating($_POST['rating'],$_POST['horecamail'],$_POST['orderCompletId']);

}

if (!empty($_POST['submitRatingH'])) {
   // var_dump($_POST['rating']);
    //var_dump($_POST['printermail']);
    //var_dump($_POST['orderCompletId']);


    $ratingsHoreca = new Orders();
    $ratingHoreca  = $ratingsHoreca->addPrinterRating($_POST['rating'],$_POST['printermail'],$_POST['orderCompletId']);

}

$activeOrderCount = new orders();
$activeOrderCount =$activeOrderCount->getCountActive($_SESSION['user']);
//var_dump($activeOrderCount["COUNT(*)"]);
if($activeOrderCount["COUNT(*)"] > 5){
    $message =" LET OP! gelieve enkel orders aan te nemen die je kan uitvoeren";
}else{
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

    <div class="error">
        <p><?php if (isset($message)) : ?>
                    <?php echo htmlspecialchars($message) ?>
                <?php endif; ?>
        </div>

    <div class="ordersContainer">

        <?php if ($account === "printer") : ?>
            <h2>MY Active orders(<?php echo htmlspecialchars($orderAmount['COUNT(*)']) ?>)</h2>
        <?php endif; ?>

        <?php if ($account === "horeca") : ?>
            <h2>MY Active orders(<?php echo htmlspecialchars($orderAmountHoreca['COUNT(*)']) ?>)</h2>
        <?php endif; ?>

        <div>

            <div class="activeOrders">
                <?php if ($account === 'printer') : ?>
                    <?php foreach ($orderA as $oA) : ?>
                        <div class="ordersCard">

                            <div class="orderCardContent">
                                <h3>OPDRACHTGEVER</h3>

                                <div class="ordersPerson">
                                    <?php foreach ($allUsers as $allUser) : ?>
                                        <?php if ($oA['horecamail'] === $allUser['email']) : ?>
                                            <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?> <p><?php echo htmlspecialchars($oA['horeca']) ?></p>
                                </div>

                                <div>
                                    <h3>BESCHRIJVING</h3>
                                    <p><?php echo htmlspecialchars($oA['description']) ?></p>
                                </div>

                                <div class="ordersInfo">
                                    <div>
                                        <h3>AANTAL</h3>
                                        <p> <?php echo htmlspecialchars($oA['amount']) ?> stuks</p>
                                    </div>

                                    <div>
                                        <h3>DEADLINE</h3>
                                        <p><?php echo htmlspecialchars($oA['deadline']) ?></p>
                                    </div>
                                </div>


                                <div>
                                    <h3>OPHALING/VERZENDING</h3>
                                    <p><?php echo htmlspecialchars($oA['send']) ?></p>
                                </div>

                                <div class="orderStatus">
                                    <div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($oA['price']) ?>">
                                            <input type="hidden" name="orderDone" value="<?php echo htmlspecialchars($oA['id']) ?>">
                                            <input class="ordersSubmit" type="Submit" name="orderDoneSubmit" value="Markeren als klaar">
                                        </form>
                                    </div>

                                    <div class="coinsOrders">
                                        <img src="./images/filamentIcon.svg" alt="your coins">
                                        <p> <?php echo htmlspecialchars($oA['price']) ?></p>
                                    </div>

                                    

                                    <div class="mailOrders">
                                        <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                        <p><?php echo htmlspecialchars($oA['horecamail']) ?></p>
                                    </div>


                                </div>

                            </div>




                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($account === "horeca") : ?>
                    <?php foreach ($orderHA as $oHA) : ?>
                        <div class="ordersCard">

                            <div class="orderCardContent">
                                <h3>GEPRINT DOOR</h3>

                                <div class="ordersPerson">
                                    <?php foreach ($allUsers as $allUser) : ?>
                                        <?php if ($oHA['printermail'] === $allUser['email']) : ?>
                                            <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <p><?php echo htmlspecialchars($oHA['printer']) ?></p>
                                </div>

                                <div>
                                    <h3>BESCHRIJVING</h3>
                                    <p><?php echo htmlspecialchars($oHA['description']) ?></p>
                                </div>

                                <div class="ordersInfo">
                                    <div>
                                        <h3>AANTAL</h3>
                                        <p><?php echo htmlspecialchars($oHA['amount']) ?> stuks</p>
                                    </div>

                                    <div>
                                        <h3>DEADLINE</h3>
                                        <p><?php echo htmlspecialchars($oHA['deadline']) ?></p>
                                    </div>
                                </div>


                                <div>
                                    <h3>OPHALING/VERZENDING</h3>
                                    <p><?php echo htmlspecialchars($oHA['send']) ?></p>
                                </div>

                                <div class="orderStatus">
                                    <div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="orderDone" value="<?php echo htmlspecialchars($oHA['id']) ?>">
                                            <input class="ordersSubmit" name="orderDoneSubmit" value="in progress">
                                        </form>
                                    </div>

                                    <div class="coinsOrders">
                                        <img src="./images/filamentIcon.svg" alt="your coins">
                                        <p> <?php echo htmlspecialchars($oHA['price']) ?></p>
                                    </div>

                                    <div class="mailOrders">
                                        <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                        <p><?php echo htmlspecialchars($oHA['printermail']) ?></p>
                                    </div>


                                </div>

                            </div>




                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>


        </div>



        <?php if ($account === 'printer') : ?>
            <h2>New orders</h2>
        <?php endif; ?>

        <?php if ($account === 'horeca') : ?>
            <h2>Orders ready for shipment/collection</h2>
        <?php endif; ?>

        <div class="newOrders">
            <?php if ($account === "printer") : ?>
                <?php foreach ($orderNA as $oNA) : ?>
                    <div class="ordersCard">

                        <div class="orderCardContent">
                            <h3>OPDRACHTGEVER</h3>

                            <div class="ordersPerson">
                                <?php foreach ($allUsers as $allUser) : ?>
                                    <?php if ($oNA['horecamail'] === $allUser['email']) : ?>
                                        <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                    <?php endif; ?>
                                <?php endforeach; ?> <p><?php echo htmlspecialchars($oNA['horeca']) ?></p>
                            </div>

                            <div>
                                <h3>BESCHRIJVING</h3>
                                <p><?php echo htmlspecialchars($oNA['description']) ?></p>
                            </div>

                            <div class="ordersInfo">
                                <div>
                                    <h3>AANTAL</h3>
                                    <p><?php echo htmlspecialchars($oNA['amount']) ?></p>
                                </div>

                                <div>
                                    <h3>DEADLINE</h3>
                                    <p><?php echo htmlspecialchars($oNA['deadline']) ?></p>
                                </div>
                            </div>


                            <div>
                                <h3>OPHALING/VERZENDING</h3>
                                <p><?php echo htmlspecialchars($oNA['send']) ?></p>
                            </div>

                            <div class="orderStatus">
                                <div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="ordersAccept" value="<?php echo htmlspecialchars($oNA['id']) ?>">
                                        <input class="ordersSubmit" type="submit" name="ordersAcceptSubmit" value="Order aannemen">
                                    </form>
                                </div>

                                <div class="coinsOrders">
                                    <img src="./images/filamentIcon.svg" alt="your coins">
                                    <p> <?php echo htmlspecialchars($oNA['price']) ?></p>
                                </div>

                                <div class="mailOrders">
                                    <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                    <p><?php echo htmlspecialchars($oNA['horecamail']) ?></p>
                                </div>


                            </div>

                        </div>




                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($account === 'horeca') : ?>
                <?php foreach ($orderRS as $oRS) : ?>
                    <div class="ordersCard">

                        <div class="orderCardContent">
                            <h3>OPDRACHTGEVER</h3>

                            <div class="ordersPerson">
                                <?php foreach ($allUsers as $allUser) : ?>
                                    <?php if ($oRS['printermail'] === $allUser['email']) : ?>
                                        <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <p><?php echo htmlspecialchars($oRS['printer']) ?></p>
                            </div>

                            <div>
                                <h3>BESCHRIJVING</h3>
                                <p><?php echo htmlspecialchars($oRS['description']) ?></p>
                            </div>

                            <div class="ordersInfo">
                                <div>
                                    <h3>AANTAL</h3>
                                    <p><?php echo htmlspecialchars($oRS['amount']) ?></p>
                                </div>

                                <div>
                                    <h3>DEADLINE</h3>
                                    <p><?php echo htmlspecialchars($oRS['deadline']) ?></p>
                                </div>
                            </div>


                            <div>
                                <h3>OPHALING/VERZENDING</h3>
                                <p><?php echo htmlspecialchars($oNRS['send']) ?></p>
                            </div>

                            <div class="orderStatus">
                                <div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="printermail" value="<?php echo htmlspecialchars($oRS['printermail']) ?>">
                                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($oRS['price']) ?>">
                                        <input type="hidden" name="ordersReceived" value="<?php echo htmlspecialchars($oRS['id']) ?>">
                                        <input class="ordersSubmit" type="submit" name="ordersReceivedSubmit" value="ontvangen">
                                    </form>
                                </div>

                                <div class="coinsOrders">
                                    <img src="./images/filamentIcon.svg" alt="your coins">
                                    <p> <?php echo htmlspecialchars($oRS['price']) ?></p>
                                </div>

                                <div class="mailOrders">
                                    <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                    <p><?php echo htmlspecialchars($oRS['printermail']) ?></p>
                                </div>


                            </div>

                        </div>




                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>




        <?php if ($account === 'printer') : ?>

        <h2>Orders awaiting confimation</h2>
        <?php endif; ?>

        <div class="completedOrders">
            <?php if ($account === 'printer') : ?>
                <?php foreach ($orderAW as $oAW) : ?>

                    <div class="ordersCard">

                        <div class="orderCardContent">
                            <h3>OPDRACHTGEVER</h3>

                            <div class="ordersPerson">
                                <?php foreach ($allUsers as $allUser) : ?>
                                    <?php if ($oAW['horecamail'] === $allUser['email']) : ?>
                                        <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                    <?php endif; ?>
                                <?php endforeach; ?> <p><?php echo htmlspecialchars($oC['horeca']) ?></p>
                            </div>

                            <div>
                                <h3>BESCHRIJVING</h3>
                                <p><?php echo htmlspecialchars($oAW['description']) ?></p>
                            </div>

                            <div class="ordersInfo">
                                <div>
                                    <h3>AANTAL</h3>
                                    <p><?php echo htmlspecialchars($oAW['amount']) ?></p>
                                </div>

                                <div>
                                    <h3>DEADLINE</h3>
                                    <p><?php echo htmlspecialchars($AW['deadline']) ?></p>
                                </div>
                            </div>


                            <div>
                                <h3>OPHALING/VERZENDING</h3>
                                <p><?php echo htmlspecialchars($AW['send']) ?></p>
                            </div>

                            <div class="orderStatus">
                                <div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="ordersAwaitingSubmit" value="3487">
                                        <input class="ordersSubmit ordersComplete" value="checking">
                                    </form>
                                </div>

                                <div class="coinsOrders">
                                    <img src="./images/filamentIcon.svg" alt="your coins">
                                    <p><?php echo htmlspecialchars($oAW['price']) ?></p>
                                </div>

                                <div class="mailOrders">
                                    <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                    <p><?php echo htmlspecialchars($oAW['horecamail']) ?></p>
                                </div>


                            </div>

                        </div>




                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>









        <h2>My completed orders</h2>
        <div class="completedOrders">
            <?php if ($account === 'printer') : ?>
                <?php foreach ($orderC as $oC) : ?>

                    <div class="ordersCard">

                        <div class="orderCardContent">
                            <h3>OPDRACHTGEVER</h3>

                            <div class="ordersPerson">
                                <?php foreach ($allUsers as $allUser) : ?>
                                    <?php if ($oC['horecamail'] === $allUser['email']) : ?>
                                        <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                    <?php endif; ?>
                                <?php endforeach; ?> <p><?php echo htmlspecialchars($oC['horeca']) ?></p>
                            </div>

                            <div>
                                <h3>BESCHRIJVING</h3>
                                <p><?php echo htmlspecialchars($oC['description']) ?></p>
                            </div>

                            <div class="ordersInfo">
                                <div>
                                    <h3>AANTAL</h3>
                                    <p><?php echo htmlspecialchars($oC['amount']) ?></p>
                                </div>

                                <div>
                                    <h3>DEADLINE</h3>
                                    <p><?php echo htmlspecialchars($oC['deadline']) ?></p>
                                </div>
                            </div>


                            <div>
                                <h3>OPHALING/VERZENDING</h3>
                                <p><?php echo htmlspecialchars($oC['send']) ?></p>
                            </div>

                            <div class="orderStatus">
                                <div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="ordersSubmit" value="3487">
                                        <input class="ordersSubmit ordersComplete" value="klaar">
                                    </form>
                                </div>

                                <div class="coinsOrders">
                                    <img src="./images/filamentIcon.svg" alt="your coins">
                                    <p><?php echo htmlspecialchars($oC['price']) ?></p>
                                </div>

                                <div>
                                        <form action="" method="POST">
                                            <label for="rating">Rate this order:</label>
                                            <select name="rating" id="rating">
                                            <option value="1">Rate this order</option>
                                                <option value="1">⭐1</option>
                                                <option value="2">⭐⭐2</option>
                                                <option value="3">⭐⭐⭐3</option>
                                                <option value="4">⭐⭐⭐⭐4</option>
                                                <option value="5">⭐⭐⭐⭐⭐5</option>
                                            </select>

                                            <input type="hidden" name="orderCompletId" value="<?php echo htmlspecialchars($oC['id'])?>">
                                            <input type="hidden" name="horecamail" value="<?php echo htmlspecialchars($oC['horecamail'])?>">

                                            <input class="ratingbtn " type="submit" name="submitRating" value="Submit">
                                        </form>
                                    </div>

                                <div class="mailOrders">
                                    <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                    <p><?php echo htmlspecialchars($oC['horecamail']) ?></p>
                                </div>


                            </div>

                        </div>




                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($account === "horeca") : ?>
                <?php foreach ($orderHC as $oHC) : ?>

                    <div class="ordersCard">

                        <div class="orderCardContent">
                            <h3>OPDRACHTGEVER</h3>

                            <div class="ordersPerson">
                                <?php foreach ($allUsers as $allUser) : ?>
                                    <?php if ($oHC['printermail'] === $allUser['email']) : ?>
                                        <img src="./images/<?php echo htmlspecialchars($allUser['image']) ?>" alt="">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <p><?php echo htmlspecialchars($oHC['printer']) ?></p>
                            </div>

                            <div>
                                <h3>BESCHRIJVING</h3>
                                <p><?php echo htmlspecialchars($oHC['description']) ?></p>
                            </div>

                            <div class="ordersInfo">
                                <div>
                                    <h3>AANTAL</h3>
                                    <p><?php echo htmlspecialchars($oHC['amount']) ?></p>
                                </div>

                                <div>
                                    <h3>DEADLINE</h3>
                                    <p><?php echo htmlspecialchars($oHC['deadline']) ?></p>
                                </div>
                            </div>


                            <div>
                                <h3>OPHALING/VERZENDING</h3>
                                <p><?php echo htmlspecialchars($oHC['send']) ?></p>
                            </div>

                            <div class="orderStatus">
                                <div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="ordersSubmit" value="3487">
                                        <input class="ordersSubmit ordersComplete" value="klaar">
                                    </form>
                                </div>

                                <div class="coinsOrders">
                                    <img src="./images/filamentIcon.svg" alt="your coins">
                                    <p><?php echo htmlspecialchars($oHC['price']) ?></p>
                                </div>

                                <div>
                                        <form action="" method="POST">
                                            <label for="rating">Rate this order:</label>
                                            <select name="rating" id="rating">
                                            <option value="1">Rate this order</option>
                                                <option value="1">⭐1</option>
                                                <option value="2">⭐⭐2</option>
                                                <option value="3">⭐⭐⭐3</option>
                                                <option value="4">⭐⭐⭐⭐4</option>
                                                <option value="5">⭐⭐⭐⭐⭐5</option>
                                            </select>

                                            <input type="hidden" name="orderCompletId" value="<?php echo htmlspecialchars($oHC['id'])?>">
                                            <input type="hidden" name="printermail" value="<?php echo htmlspecialchars($oHC['printermail'])?>">

                                            <input class="ratingbtn " type="submit" name="submitRatingH" value="Submit">
                                        </form>
                                    </div>

                                <div class="mailOrders">
                                    <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                    <p><?php echo htmlspecialchars($oHC['printermail']) ?></p>
                                </div>


                            </div>

                        </div>




                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>






    </div>
    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

    <script src="js.js"></script>


</body>

</html>