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
    <div class="error">
        <p>hier komt een error</p>
    </div>

    <div class="loginLogo registerLogo">
        <img src="./images/logo.PNG" alt="logo">
    </div>

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


        
        <label id="loginLabel" >SOORT ACCOUNT</label>
        <div class="loginCheckbox">
            <div class="checkbox"></div>
            <p>Horeca</p>
            <div class="checkbox"></div>
            <p>3D printer</p>
        </div>



        <input  id="loginSubmit" type="submit" name="submit" value="Registreren" >

        <a href="login.php">Login</a>

    </form>
</body>

</html>