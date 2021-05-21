<?php

include_once(__DIR__ . "/classes/Users.php");

//if form is submitted
if (!empty($_POST)) {

 
try{
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $accountType = $_POST['accType'];

    $users = new Users;
    $users->register($surname, $name, $email, $username, $password, $accountType);
}catch(Throwable $error) {
        // if any errors are thrown in the class, they can be caught here
        $error = $error->getMessage();
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

<body class="BackgroundColor">
    <div class=registerContainer>


        <div class="loginLogo registerLogo">
            <img src="./images/logo.svg" alt="logo">
        </div>
        <div class="error">
            <p><?php if(isset($error)):?>
                <?php echo htmlspecialchars($error)?>
                <?php endif;?>
            </p>
        </div>

        <form id="loginForm" action="" method="POST">

            <label id="loginLabel" for="surname">VOORNAAM</label>
            <input id="loginInput" type="text" name="surname" placeholder="Voornaam">

            <label id="loginLabel" for="name">NAAM</label>
            <input id="loginInput" type="text" name="name" placeholder="Naam">

            <label id="loginLabel" for="email">EMAILADRESS</label>
            <input id="loginInput" type="email" name="email" placeholder="Emailadress">

            <label id="loginLabel" for="name">GEBRUIKERSNAAM</label>
            <input id="loginInput" type="text" name="username" placeholder="Gebruikersnaam">

            <label id="loginLabel" for="password">WACHTWOORD</label>
            <input id="loginInput" type="password" name="password" placeholder="Wachtwoord">



            <label id="loginLabel">SOORT ACCOUNT</label>
<label class="container">Horeca
                <input type="radio" name="accType"  value="horeca">
                <span class="checkmark"></span>
            </label>
           
            <label class="container">3D printer
                <input type="radio"  name="accType" value="printer">
                <span class="checkmark"></span>
            </label>

            <input id="loginSubmit" type="submit" name="submit" value="Registreren">

            <a href="login.php">Login</a>

        </form>

    </div>
</body>

</html>