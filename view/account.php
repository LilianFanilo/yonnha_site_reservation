<?php
    if(isset($_GET["action"])) :

        $action = $_GET["action"];

        if ($action === "login") : 
?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="./view/style/style.css">
                <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
                <title>Connexion</title>
            </head>
            <body>

                <?php
                    include 'navbar.php';
                ?>

                <section id="log-page">
                    <form action="./api/users.php">
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

                <?php
                    if (isset($_GET["result"])) :
                        $result = $_GET["result"];
                        if ($result === "succes") :
                ?>
                            <p>Enregistrement Réussi</p>
                <?php
                        endif;
                        if ($result === "erreur") :
                ?>
                            <p>Erreur lors de l'enregistrement</p>
                <?php
                        endif;
                    endif;
                ?>
                
            </body>
            <!-- <script src="script.js"></script> -->
            </html>
<?php endif;


        if ($action === "signup") :
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./view/style/style.css">
            <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
            <title>Inscription</title>
        </head>
        <body>
            <?php
                include 'navbar.php';
            ?>
            <section id="account-first">
                <form action="./api/users.php" method="POST">
                    
                    <label for="login">Saisissez votre login :</label>
                    <input type=text name="login"> 
            
                    <label for="mail">Saisissez votre mail :</label>
                    <input type="email" name="mail"> 
                    
                    <label for="name">Saisissez votre nom :</label>
                    <input type=text name="surname"> 
                    
                    <label for="surname">Saisissez votre prenom :</label>
                    <input type=text name="name"> 

                    <label for="birthday">Saisissez votre date de naissance :</label>
                    <input type=date name="birthday"> 
                
                    <p>et votre mot de passe :</p>
                    <input type="password" name="pwd">
                    <input type=submit value= "OK">

                    <input type="hidden" name="add_user">                 
                </form>
                <a href="index.php?tag=account&action=login">Déjà un compte ? Connectez-vous !</a>
                </section>
        </body>
        </html>
<?php 
    endif;
    if ($action === "logout") :        
    ?>   

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./view/style/style.css">
            <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
            <title>Déconnexion</title>
        </head>
        <body>
            <?php
                include 'navbar.php';
            ?>
            Vous avez bien été déconnecté
        </body>
        </html>

<?php
    endif ;
    endif;
?>