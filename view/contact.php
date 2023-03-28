<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/style/style.css">
    <title>Contact</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <section id="contact-first">
        <h1>Contactez-nous</h1>
        <form action="/submit-form.php" method="post">
            <div>
                <label for="nom">Nom :</label><br>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div>
                <label for="prenom">Prénom :</label><br>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="telephone">Téléphone :</label><br>
                <input type="tel" id="telephone" name="telephone">
            </div>
            <div>
                <label for="message">Message :</label><br>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div>
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </section>
</body>

</html>