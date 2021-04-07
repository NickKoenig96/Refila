<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="error">
    <p>hier komt een error</p>
</div>

    <div class="loginLogo">
    <img src="./images/logo.PNG" alt="logo">
    </div>

    <form id="loginForm" action="" method="POST">
    <label id="loginLabel" for="email">EMAILADRESS</label>
    <input id="loginInput" type="text" name="email" placeholder="Emailadress">

    <label id="loginLabel" for="password">WACHTWOORD</label>
    <input id="loginInput"  type="text" name="password" placeholder="Wachtwoord">

    <input id="loginSubmit" type="submit" name="submit" value="Login">
    
    <a href="register.php">Registreren</a>

    </form>

</body>
</html>