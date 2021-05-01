<?php
session_start();

//var_dump($_SESSION['user']);

include_once(__DIR__ . "/classes/Users.php");
include_once(__DIR__ . "/classes/Orders.php");


$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);



$ordersA = new Orders();
$orderA = $ordersA->getAllActivePrinter($_SESSION['user']);


$ordersNA = new Orders();
$orderNA = $ordersNA->getAllNotActivePrinter();

$ordersC = new Orders();
$orderC = $ordersC->getAllCompletedPrinter($_SESSION['user']);

$ordersAmount = new Orders();
$orderAmount = $ordersAmount->getActiveOrdersAmount($_SESSION['user']);

if (!empty($_POST['orderDoneSubmit'])) {
    $updateActiveOrders = new Orders();
    $updateActiveOrder = $updateActiveOrders->completeOrder($_SESSION['user'], $_POST['orderDone']);
    header('Location: orders.php');

} 

if (!empty($_POST['ordersAcceptSubmit'])) {
    $AcceptOrders = new Orders();
    $AcceptOrder = $AcceptOrders->AcceptOrder($_SESSION['user'], $_POST['ordersAccept']);
    header('Location: orders.php');
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

    <div class="ordersContainer">


        <h2>MY Active orders(<?php echo htmlspecialchars($orderAmount['COUNT(*)']) ?>)</h2>
        <div>

            <div class="activeOrders">
                <?php foreach ($orderA as $oA) : ?>
                    <div class="ordersCard">

                        <div class="orderCardContent">
                            <h3>OPDRACHTGEVER</h3>

                            <div class="ordersPerson">
                                <img src="./images/Profile.jpeg" alt="">
                                <p><?php echo htmlspecialchars($oA['horeca']) ?></p>
                            </div>

                            <div>
                                <h3>BESCHRIJVING</h3>
                                <p><?php echo htmlspecialchars($oA['description']) ?></p>
                            </div>

                            <div class="ordersInfo">
                                <div>
                                    <h3>AANTAL</h3>
                                    <p><?php echo htmlspecialchars($oA['amount']) ?> stuks</p>
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




            </div>


        </div>












        <h2>New orders</h2>
        <div class="newOrders">
            <?php foreach ($orderNA as $oNA) : ?>
                <div class="ordersCard">

                    <div class="orderCardContent">
                        <h3>OPDRACHTGEVER</h3>

                        <div class="ordersPerson">
                            <img src="./images/Profile.jpeg" alt="">
                            <p><?php echo htmlspecialchars($oNA['horeca']) ?></p>
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

        </div>









        <h2>My completed orders</h2>
        <div class="completedOrders">
            <?php foreach ($orderC as $oC) : ?>

                <div class="ordersCard">

                    <div class="orderCardContent">
                        <h3>OPDRACHTGEVER</h3>

                        <div class="ordersPerson">
                            <img src="./images/Profile.jpeg" alt="">
                            <p><?php echo htmlspecialchars($oC['horeca']) ?></p>
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

                            <div class="mailOrders">
                                <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                <p><?php echo htmlspecialchars($oC['horecamail']) ?></p>
                            </div>


                        </div>

                    </div>




                </div>
            <?php endforeach; ?>

        </div>






    </div>
    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

</body>

</html>