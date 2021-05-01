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


        <h2>MY Active orders(1)</h2>
        <div>

            <div class="activeOrders">
                <?php foreach($orderA as $oA):?>
                <div class="ordersCard">

                    <div class="orderCardContent">
                        <h3>OPDRACHTGEVER</h3>

                        <div class="ordersPerson">
                            <img src="./images/Profile.jpeg" alt="">
                            <p><?php  echo htmlspecialchars($oA['horeca'])?></p>
                        </div>

                        <div>
                            <h3>BESCHRIJVING</h3>
                            <p><?php echo htmlspecialchars($oA['description'])?></p>
                        </div>

                        <div class="ordersInfo">
                            <div>
                                <h3>AANTAL</h3>
                                <p><?php echo htmlspecialchars($oA['amount'])?> stuks</p>
                            </div>

                            <div>
                                <h3>DEADLINE</h3>
                                <p><?php echo htmlspecialchars($oA['deadline'])?></p>
                            </div>
                        </div>


                        <div>
                            <h3>OPHALING/VERZENDING</h3>
                            <p><?php echo htmlspecialchars($oA['send'])?></p>
                        </div>

                        <div class="orderStatus">
                            <div>
                                <form action="" method="POST">
                                    <input type="hidden" name="ordersSubmit" value="3487">
                                    <input class="ordersSubmit" type="submit" value="Markeren als klaar">
                                </form>
                            </div>

                            <div class="coinsOrders">
                                <img src="./images/filamentIcon.svg" alt="your coins">
                                <p> <?php  echo htmlspecialchars($oA['price'])?></p>
                            </div>

                            <div class="mailOrders">
                                <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                                <p><?php  echo htmlspecialchars($oA['horecamail'])?></p>
                            </div>


                        </div>

                    </div>




                </div>
                <?php endforeach;?>




            </div>


        </div>












        <h2>New orders</h2>
        <div>
            <?php foreach($orderNA as $oNA):?>
            <div class="ordersCard">

                <div class="orderCardContent">
                    <h3>OPDRACHTGEVER</h3>

                    <div class="ordersPerson">
                        <img src="./images/Profile.jpeg" alt="">
                        <p><?php  echo htmlspecialchars($oA['horeca'])?></p>
                    </div>

                    <div>
                        <h3>BESCHRIJVING</h3>
                        <p><?php echo htmlspecialchars($oA['description'])?></p>
                    </div>

                    <div class="ordersInfo">
                        <div>
                            <h3>AANTAL</h3>
                            <p><?php echo htmlspecialchars($oA['amount'])?></p>
                        </div>

                        <div>
                            <h3>DEADLINE</h3>
                            <p><?php echo htmlspecialchars($oA['deadline'])?></p>
                        </div>
                    </div>


                    <div>
                        <h3>OPHALING/VERZENDING</h3>
                        <p><?php echo htmlspecialchars($oA['send'])?></p>
                    </div>

                    <div class="orderStatus">
                        <div>
                            <form action="" method="POST">
                                <input type="hidden" name="ordersSubmit" value="3487">
                                <input class="ordersSubmit" type="submit" value="Order aannemen">
                            </form>
                        </div>

                        <div class="coinsOrders">
                            <img src="./images/filamentIcon.svg" alt="your coins">
                            <p> <?php  echo htmlspecialchars($oA['price'])?></p>
                        </div>

                        <div class="mailOrders">
                            <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                            <p><?php  echo htmlspecialchars($oA['horecamail'])?></p>
                        </div>


                    </div>

                </div>




            </div>
            <?php endforeach;?>

        </div>









        <h2>My completed orders</h2>
        <div>
        <?php foreach($orderC as $oC):?>

            <div class="ordersCard">

                <div class="orderCardContent">
                    <h3>OPDRACHTGEVER</h3>

                    <div class="ordersPerson">
                        <img src="./images/Profile.jpeg" alt="">
                        <p><?php  echo htmlspecialchars($oA['horeca'])?></p>
                    </div>

                    <div>
                        <h3>BESCHRIJVING</h3>
                        <p><?php echo htmlspecialchars($oA['description'])?></p>
                    </div>

                    <div class="ordersInfo">
                        <div>
                            <h3>AANTAL</h3>
                            <p><?php echo htmlspecialchars($oA['amount'])?></p>
                        </div>

                        <div>
                            <h3>DEADLINE</h3>
                            <p><?php echo htmlspecialchars($oA['deadline'])?></p>
                        </div>
                    </div>


                    <div>
                        <h3>OPHALING/VERZENDING</h3>
                        <p><?php echo htmlspecialchars($oA['send'])?></p>
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
                            <p><?php  echo htmlspecialchars($oA['price'])?></p>
                        </div>

                        <div class="mailOrders">
                            <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                            <p><?php  echo htmlspecialchars($oA['horecamail'])?></p>
                        </div>


                    </div>

                </div>




            </div>
            <?php endforeach;?>

        </div>






    </div>
    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

</body>

</html>