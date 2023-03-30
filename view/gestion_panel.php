<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yonnha présente sa toute nouvelle exposition: La révolution en couleur"/>
    <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
    <link rel="stylesheet" href="./view/style/style.css">
    <title>Panneau de gestion</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>

    <div>
        <a href="">Gestion utilisateur</a>
        <a href="">Statistique</a>
    </div>

    <section>

    </section>

    <section>
        <div>
            <a href="controller/controller-panel.php?tri=a-z">A-Z</a>
            <a href="controller/controller-panel.php?tri=recent">Les plus récents</a>
            <a href="controller/controller-panel.php?tri=good_client">Bon client</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Mail</th>
                    <th>Date de création</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </section>
</body>

<?php
    include 'footer.php'
    ?>

</html>