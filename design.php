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
  <?php include("./nav2.inc.php")?>
    </div>

    <div class="design">
        <h3>DESIGN VAN DE MAAND</h3>
        <h1>Het beste design van deze maand</h1>
        <img src="./images/design.png" alt="design">
        <div>
            <div>
                <p class="designTitle">TITEl</p>
                <p>Moderne vork, mes en lepel</p>
            </div>

            <div>
                <p class="designTitle">ONTWERPER</p>
                <p>olmahadj01</p>
            </div>

            <div>
                <p class="designTitle">BESCHRIJVING</p>
                <p>3d design van vork, mes en lepel
                    inclusief materiaal</p>
            </div>

            <div>
                <P class="designTitle">PROGRAMMA</P>
                <p>Blender</p>
            </div>
        </div>
    </div>

    <div class="footer">
<?php include("./footer.inc.php")?>
</div>

</body>

</html>