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
<?php include("./nav.inc.php")?>
</div>    <div class="line"></div>

    <div class="ordersContainer">


        <h2>MY Active orders(1)</h2>
        <div>

            <div class="ordersCard">

                <div class="orderCardContent">
                    <h3>OPDRACHTGEVER</h3>

                    <div class="ordersPerson">
                        <img src="./images/Profile.jpeg" alt="">
                        <p>Carlton_Brasserie</p>
                    </div>

                    <div>
                        <h3>BESCHRIJVING</h3>
                        <p>plastick vork (wit)</p>
                    </div>

                    <div class="ordersInfo">
                        <div>
                            <h3>AANTAL</h3>
                            <p>75</p>
                        </div>

                        <div>
                            <h3>DEADLINE</h3>
                            <p>5 apr 2021</p>
                        </div>
                    </div>


                    <div>
                        <h3>OPHALING/VERZENDING</h3>
                        <p>Ophaling</p>
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
                            <p> 20.000</p>
                        </div>

                        <div class="mailOrders">
                            <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                            <p>emailadress here</p>
                        </div>


                    </div>

                </div>




            </div>




            <div class="ordersCard">

                <div class="orderCardContent">
                    <h3>OPDRACHTGEVER</h3>

                    <div class="ordersPerson">
                        <img src="./images/Profile.jpeg" alt="">
                        <p>Carlton_Brasserie</p>
                    </div>

                    <div>
                        <h3>BESCHRIJVING</h3>
                        <p>plastick vork (wit)</p>
                    </div>

                    <div class="ordersInfo">
                        <div>
                            <h3>AANTAL</h3>
                            <p>75</p>
                        </div>

                        <div>
                            <h3>DEADLINE</h3>
                            <p>5 apr 2021</p>
                        </div>
                    </div>


                    <div>
                        <h3>OPHALING/VERZENDING</h3>
                        <p>Ophaling</p>
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
                            <p> 20.000</p>
                        </div>

                        <div class="mailOrders">
                            <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                            <p>emailadress here</p>
                        </div>


                    </div>

                </div>

            </div>
        </div>












        <h2>Open orders</h2>
        <div>

            <div class="ordersCard">

                <div class="orderCardContent">
                    <h3>OPDRACHTGEVER</h3>

                    <div class="ordersPerson">
                        <img src="./images/Profile.jpeg" alt="">
                        <p>Carlton_Brasserie</p>
                    </div>

                    <div>
                        <h3>BESCHRIJVING</h3>
                        <p>plastick vork (wit)</p>
                    </div>

                    <div class="ordersInfo">
                        <div>
                            <h3>AANTAL</h3>
                            <p>75</p>
                        </div>

                        <div>
                            <h3>DEADLINE</h3>
                            <p>5 apr 2021</p>
                        </div>
                    </div>


                    <div>
                        <h3>OPHALING/VERZENDING</h3>
                        <p>Ophaling</p>
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
                            <p> 20.000</p>
                        </div>

                        <div class="mailOrders">
                            <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                            <p>emailadress here</p>
                        </div>


                    </div>

                </div>




            </div>
    </div>









    <h2>My completed orders</h2>
        <div>

            <div class="ordersCard">

                <div class="orderCardContent">
                    <h3>OPDRACHTGEVER</h3>

                    <div class="ordersPerson">
                        <img src="./images/Profile.jpeg" alt="">
                        <p>Carlton_Brasserie</p>
                    </div>

                    <div>
                        <h3>BESCHRIJVING</h3>
                        <p>plastick vork (wit)</p>
                    </div>

                    <div class="ordersInfo">
                        <div>
                            <h3>AANTAL</h3>
                            <p>75</p>
                        </div>

                        <div>
                            <h3>DEADLINE</h3>
                            <p>5 apr 2021</p>
                        </div>
                    </div>


                    <div>
                        <h3>OPHALING/VERZENDING</h3>
                        <p>Ophaling</p>
                    </div>

                    <div class="orderStatus">
                        <div>
                            <form action="" method="POST">
                                <input type="hidden" name="ordersSubmit" value="3487">
                                <input class="ordersSubmit ordersComplete"  value="klaar">
                            </form>
                        </div>

                        <div class="coinsOrders">
                            <img src="./images/filamentIcon.svg" alt="your coins">
                            <p> 20.000</p>
                        </div>

                        <div class="mailOrders">
                            <p><a href="mailto:someone@example.com">Contact opnemen</a></p>
                            <p>emailadress here</p>
                        </div>


                    </div>

                </div>




            </div>

    </div>






</div>
<div class="footer">
<?php include("./footer.inc.php")?>
</div>

</body>

</html>