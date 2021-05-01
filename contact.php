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
        <h2>Contact</h2>
        <div class="ordersCard orderscard2">

            <div class="contactCard">
                <div class="contact">
                    <form id="contactForm" action="" method="POST">
                        <label id="loginLabel " for="surname">VOORNAAM</label>
                        <input class="contactInput" type="text" name="surname" placeholder="Voornaam">

                        <label id="loginLabel" for="name">NAAM</label>
                        <input class="contactInput" type="text" name="name" placeholder="Naam">

                        <label id="loginLabel" for="email">EMAILADRESS</label>
                        <input class="contactInput" type="text" name="email" placeholder="Emailadress">

                        <label id="loginLabel" for="bericht">BERICHT</label>
                        <textarea name="bericht" form="contactForm" placeholder="Bericht"></textarea>

                        <input id="contactButton" type="submit" name="submit" value="send">

                    </form>

                </div>

                <div class="contactInfoDesktop">



                    <div class="contactInfoDiv">
                        <img src="./images/telephone.svg" alt="phoneicon">
                        <p>+32 478 35 15 83</p>
                    </div>

                    <div class="contactInfoDiv">
                        <img src="./images/location.svg" alt="locationicon">
                        <p>2800, Mechelen</p>
                    </div>

                    <div class="contactInfoDiv">
                        <img src="./images/email.svg" alt="emailicon">
                        <p>contact@refila.be</p>
                    </div>





                    <div class="contactInfoDiv">
                        <img src="./images/instagram.svg" alt="instagramicon">
                        <img src="./images/facebook.svg" alt="facebookicon">
                    </div>



                </div>

            </div>






        </div>

        <div class="contactInfo">



            <div class="contactInfoDiv">
                <img src="./images/telephone.svg" alt="phoneicon">
                <p>+32 478 35 15 83</p>
            </div>

            <div class="contactInfoDiv">
                <img src="./images/location.svg" alt="locationicon">
                <p>2800, Mechelen</p>
            </div>

            <div class="contactInfoDiv">
                <img src="./images/email.svg" alt="emailicon">
                <p>contact@refila.be</p>
            </div>





            <div class="contactInfoDiv">
                <img src="./images/instagram.svg" alt="instagramicon">
                <img src="./images/facebook.svg" alt="facebookicon">
            </div>



        </div>
    </div>


    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

</body>

</html>