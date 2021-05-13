<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
};


include_once(__DIR__ . "/classes/Users.php");
$users = new Users();
$users = $users->getUserByEmail($_SESSION['user']);

if(!empty($_POST['submitProfile'])){

    $userProfile =new Users();
    $userProfile->updateUser($_POST['name'],$_POST['surname'],$_POST['gebruikersnaam'],$_POST['email'],$_POST['password']);
    $message = "je veranderingen zijn opgeslagen";
}

//(profile)Image upload in directory and name in db
$target_dir = "images/";

if (!empty($_POST["submitAvatar"])) {
var_dump('yesy');
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
}

$error = '';

// Check if image file is a actual image or fake image
if (!empty($_POST["submitAvatar"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $error = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 1;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && !empty($_FILES["file"]["name"])
    ) {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $avatar = basename($_FILES["fileToUpload"]["name"]);
            var_dump($avatar);
            $userAvatar = new Users();
            $userAvatar->uploadAvatar($_SESSION['user'],$avatar);
            header('Location: profile.php');

        }
    }
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
        <h2>Settings</h2>

        <div class="ordersCard orderscard2">

            <h3 class="h3Profile">Persoonlijke gegevens aanpassen (alle velden moeten ingevuld worden)</h3>
            <div class="orders">
                <div class="OrdersP1">
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

                        <label id="loginLabel" for="">SOORT ACCOUNT : 3D printer</label>


                        <input id="loginSubmit" type="submit" name="submitProfile" value="Opslaan">


                    </form>



                </div>

                <div class="ordersP2">
                    <h3>Profielfoto uploaden</h3>
                    <form class="ulpoadForm" action="" method="post" enctype="multipart/form-data">
                        <img src="./images/<?php echo htmlspecialchars($users['image'])?>" alt="">
                        <div>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submitAvatar">
                        </div>

                    </form>

                </div>



            </div>






        </div>





        <h2>Abonnementen</h2>
        <div class="abo">

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



    </div>


    <div class="footer">
        <?php include("./footer.inc.php") ?>
    </div>

    <script src="js.js"></script>


</body>

</html>