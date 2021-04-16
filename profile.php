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
    <div class="line"></div>

    <div class="ordersContainer">
        <h2>Settings</h2>

        <div class="ordersCard">
            <h3 class="h3Profile">Persoonlijke gegevens</h3>

            <form id="loginForm" action="" method="POST">
                <label id="loginLabel" for="surname">VOORNAAM</label>
                <input id="loginInput" type="text" name="surname" placeholder="Voornaam">

                <label id="loginLabel" for="name">NAAM</label>
                <input id="loginInput" type="text" name="name" placeholder="Naam">

                <label id="loginLabel" for="email">EMAILADRESS</label>
                <input id="loginInput" type="text" name="email" placeholder="Emailadress">

                <label id="loginLabel" for="name">GEBRUIKERSNAAM</label>
                <input id="loginInput" type="text" name="gebruikersnaam" placeholder="Gebruikersnaam">

                <label id="loginLabel" for="password">WACHTWOORD</label>
                <input id="loginInput" type="text" name="password" placeholder="Wachtwoord">


                <input id="loginSubmit" type="submit" name="submit" value="Opslaan">


            </form>

            <form action="upload.php" method="post" enctype="multipart/form-data">

                <h3>Profielfoto uploaden</h3>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input  type="submit" value="Upload Image" name="submit">
            </form>



        </div>





        <h2>Abonnementen</h2>
        <div class="ordersCard">
            <div class="abonnement">
            <h3>The 3D DUDE</h3>
            <p>(light user)</p>
            <p>7kg filament per jaar</p>
            <p class="abonnementprice">$99.-</p>
            </div>
        </div>

        <div class="ordersCard">

        <div class="abonnement">
            <h3>The 3D HERO</h3>
            <p>(medium user)</p>
            <p>15kg filament per jaar</p>
            <p class="abonnementprice">$199.-</p>
            </div>
            </div>

            <div class="ordersCard">

            <div class="abonnement">
            <h3>The 3D MANIAC</h3>
            <p>(heavy user)</p>
            <p>25kg filament per jaar</p>
            <p class="abonnementprice">$299.--</p>
            </div>
            </div>


    </div>


    <div class="footer">
<?php include("./footer.inc.php")?>
</div>

</body>

</html>