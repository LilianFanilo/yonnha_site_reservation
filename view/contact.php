<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/style/style.css">
    <script defer src="./view/js/app.js"></script>
    <script defer src="./view/js/functions.js"></script>
    <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
    <title>Contact</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <section id="contact-first">
        <h1>Contactez-nous</h1>
            <div class="inner">

                <form action="./api/contact.php" method="post">
                    <h2>Formulaire</h3>
                    <div>
                        <span for="">Nom</span>
                        <label class="form-group" for="nom">
                        <span class="border"></span>
                        <input type="text" id="nom" name="nom" class="form-control" required>
                        </label>

                    </div>
                    <div>
                        <span for="">Prénom</span>
                        <label class="form-group" for="prenom">
                        <span class="border"></span>
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                        </label>
                    </div>
                    <div>
                        <span for="">Email</span>
                        <label class="form-group" for="email">
                        <span class="border"></span>
                        <input type="email" id="email" name="email" class="form-control" required>
                        </label>
                    </div>
                    <div>
                        <span for="">Téléphone</span>
                        <label class="form-group" for="telephone">
                        <span class="border"></span>
                        <input type="tel" id="telephone" name="telephone" class="form-control">
                        </label>
                    </div>
                    <div>
                        <span for="">Message</span>
                        <label class="form-group" for="message">
                        <span class="border"></span>
                        <textarea id="message" name="message" class="form-control" required>
                        </textarea>
                        </label>
                            
                    </div>
                    <div>
                        <input type="submit" name="contact_mail">Envoyer</input>
                    </div>
                </form>
            </div>
    </section>
</body>

</html>