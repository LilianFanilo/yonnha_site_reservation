<?php
if (isset($_GET["action"])) :

    $action = $_GET["action"];

    if ($action === "login") :
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Yonnha</title>
            <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
            <link rel="stylesheet" href=" ./view/style/style.css">
            <script defer src="./view/js/app.js"></script>
            <script defer src="./view/js/functions.js"></script>
            <title>Connexion</title>
        </head>

        <body>

            <?php
            include 'navbar.php';
            ?>

            <section id="log-page">
                <div class="log inner">
                    <form action="./api/users.php">
                        <ul>

                            <li>
                                <h1>Entrez vos identifiants</h1>
                            </li>
                            <li>
                                <span for="">Login : </span>
                                <label for="login">
                                    <input type=text name="login" class="form-control" required>
                                    <?php
                                    if (isset($_GET["err"]) && $_GET["err"] == "login") {
                                        echo "ATTENTION MAUVAIS LOGIN";
                                    }
                                    ?>
                                </label>
                            </li>
                            <li>
                                <span for="">Mot de passe :</span>
                                <label for="pwd">
                                    <input type="password" name="pwd" id="myInput" required>
                                </label>
                                <div class="show-pwd">
                                    <label for="show_pwd">Montrer mot de passe
                                        <input type="checkbox" onclick="myFunction()" name="show_pwd" id="myButton" class="form-control">
                                    </label>
                                </div>
                                <?php
                                if (isset($_GET["err"]) && $_GET["err"] == "mdp") {
                                    echo "ATTENTION MAUVAIS MOT DE PASSE";
                                }
                                ?>
                            </li>
                            <li>
                                <input class="btn-bubble" type=submit value="VALIDATION">
                            </li>

                            <input type="hidden" name="session_login">

                        </ul>
                    </form>
                </div>
            

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
</section>
        </body>

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
            <title>Yonnha</title>
            <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
            <link rel="stylesheet" href=" ./view/style/style.css">
            <script defer src="./view/js/app.js"></script>
            <script defer src="./view/js/functions.js"></script>
            <title>Inscription</title>
        </head>

        <body>
            <?php
            include 'navbar.php';
            ?>
            <section id="account-first">
                <div class="account inner">
                    <h2>INSCRIPTION</h2>
                    <form action="./api/users.php" method="POST">

                        <span for="">Saisissez votre login :</span>
                        <label class="form-group" for="login">
                            <input type=text name="login" class="form-control" required>
                        </label>
                        <span for="">Saisissez votre mail :</span>
                        <label class="form-group" for="mail">
                            <input type="email" name="mail" class="form-control" required>
                        </label>
                        <span for="">Saisissez votre nom :</span>
                        <label class="form-group" for="name">
                            <input type=text name="surname" class="form-control" required>
                        </label>
                        <span for="">Saisissez votre prenom :</span>
                        <label class="form-group" for="surname">
                            <input type=text name="name" class="form-control" required>
                        </label>
                        <span for="">Saisissez votre date de naissance :</span>
                        <label class="form-group" for="birthday">
                            <input type=date name="birthday" class="form-control" required>
                        </label>
                        <p>et votre mot de passe :</p>
                        <input type="password" name="pwd" class="form-control" required>
                        <input type=submit value="VALIDATION">

                        <input type="hidden" name="add_user">
                    </form>
                    <a href="index.php?tag=account&action=login">Déjà un compte ? Connectez-vous !</a>
                </div>
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
            <title>Yonnha</title>
            <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
            <link rel="stylesheet" href=" ./view/style/style.css">
            <script defer src="./view/js/app.js"></script>
            <script defer src="./view/js/functions.js"></script>
            <title>Déconnexion</title>
        </head>

        <body>

            <?php
            include 'navbar.php';
            ?>
            <section id="deco-first">
            <p> Vous avez bien été déconnecté</p>
            </section>
        </body>

        </html>

<?php
    endif;
endif;
?>