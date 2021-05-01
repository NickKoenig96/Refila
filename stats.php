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

    <div class="ordersContainer">

        <h2>Your Stats</h2>

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





    <h2>Your Rating</h2>

    <div class="statsCard">
        <div class="ratings">
            <h3>AVERAGE RATING: 4</h3>
            <p>(3 Ratings)</p>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">

                <p> 1 </p>
            </div>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <p> 2 </p>
            </div>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">
                <p> 0 </p>
            </div>

            <div>
                <img src="./images/star.svg" alt="star">
                <img src="./images/star.svg" alt="star">

                <p> 0 </p>
            </div>

            <div>

                <img src="./images/star.svg" alt="star">

                <p> 0</p>
            </div>


        </div>

    </div>
    </div>



    <h2>Global stats</h2>

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


    <div class="ordersContainer">
        <div class="leaderboardStats">
            <h4>LEADERBOARD</h4>
            <p>De top 10 printers van Refila</p>

            <div class="winners">
                <div>
                    <p>username</p>
                    <img src="./images/Profile.jpeg" alt="">
                    <p>110.000</p>
                </div>

                <div>
                    <p>username</p>
                    <img src="./images/Profile.jpeg" alt="">
                    <p>110.000</p>
                </div>

                <div>
                    <p>username</p>
                    <img src="./images/Profile.jpeg" alt="">
                    <p>110.000</p>
                </div>

            </div>

            <div class="winnersList">
                <div class="winnersListItem">
                    <p>4</p>
                    <p>username</p>
                    <div class="winnersCoins"><img src="./images/filamentIcon.svg" alt="filament">
                        <p>96.00</p>
                    </div>

                </div>


                <div class="winnersListItem">
                    <p>4</p>
                    <p>username</p>
                    <div class="winnersCoins"><img src="./images/filamentIcon.svg" alt="filament">
                        <p>96.00</p>
                    </div>

                </div>

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