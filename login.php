<?php
include_once(__DIR__ . "/classes/Users.php");


if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new Users();

    try {
        $user->canLogin($email, $password);
        session_start();
        $_SESSION['user'] = $email;
        header("location: ./");
    } catch (Throwable $error) {
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
    <title>Document</title>
</head>

<body class="BackgroundColor">

    <div class=loginContainer>

        <div class="loginLogo">
            <img src="./images/logo.svg" alt="logo">
        </div>
        <div class="error">
            <p><?php if (isset($error)) : ?>
                    <?php echo htmlspecialchars($error) ?>
                <?php endif; ?>
            </p>
        </div>
        <form id="loginForm" action="" method="POST">
            <label id="loginLabel" for="email">EMAILADRESS</label>
            <input id="loginInput" type="email" name="email" placeholder="Emailadress">

            <label id="loginLabel" for="password">WACHTWOORD</label>
            <input id="loginInput" type="password" name="password" placeholder="Wachtwoord">

            <button id="loginSubmit" type="submit" name="submit">Login</button>

            <a href="register.php">Registreren</a>

        </form>

    </div>




</body>

</html>