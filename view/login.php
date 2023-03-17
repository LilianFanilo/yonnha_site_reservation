<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script> -->
    <title>Connexion</title>
</head>
<body>

    <?php
        include 'navbar.php';
    ?>

    <section id="log-page">
        <form action="./controller/controller-user.php" method="POST">
            <ul>

                <li><h1>Entrez vos identifiants</h1></li>
                <li>
                    <label for="login">Login : </label>
                    <INPUT type=text name="login">
                    <?php 
                    if (isset($_GET["err"]) && $_GET["err"]=="login") { echo "ATTENTION MAUVAIS LOGIN";}
                    ?>
                </li>
                <li>
                    <label for="pwd">Mot de passe :</label>
                    <input type="password" name="pwd" id="myInput">
                    <div class="show-pwd">
                        <label for="show_pwd">Montrer mot de passe</label>
                        <input type="checkbox" onclick="myFunction()" name="show_pwd" id="myButton">
                    </div>
                    <?php 
                    if (isset($_GET["err"]) && $_GET["err"]=="mdp") { echo "ATTENTION MAUVAIS MOT DE PASSE";}
                    ?>
                </li>
                <li>
                    <input class="btn-bubble" type=submit value= "OK">
                </li>

                <input type="hidden" name="session_login">

            </ul>
        </form>
    </section>
    
</body>
<!-- <script src="script.js"></script> -->
</html>