<?php
$url = $api_url . "/artists";

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response === false) {
    $error = curl_error($curl);
    curl_close($curl);
    die("Erreur lors de l'appel à l'API : " . $error);
}

$data = json_decode($response);

curl_close($curl);
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
</head>

<body>
    <header>
        <?php
        include 'navbar.php';
        ?>
    </header>
    <section id="home-first">
        <h1>La révolution des couleurs</h1>
        <h2>Exposition sur les techniques de l'impressionnisme </h2>
        <a href="#home-second">Découvrir</a>
    </section>
    <section id="home-second">
        <h3>Tableau</h3>
        <div class="stroke"></div>
        <div class="accordian">
            <ul>
                <li>

                    <a href="index.php?tag=gallery">
            <img src="./view/images/la-passerelle-japonaise.jpg" alt="peinture la passerelle japonaise - Van Gogh">
                    </a>
                </li>
                <li>

                <a href="index.php?tag=gallery">
            <img src="./view/images/etrange-residence-de-taiwan.jpg" alt="l’étrange résidence de Taïwan - Chang Dai-chien">
                    </a>
                </li>
                <li>

                    <a href="index.php?tag=gallery">
            <img src="./view/images/oliviers-avec-ciel-jaune-et-soleil.webp" alt="Oliviers avec ciel jaune et soleil - Van Gogh">
                    </a>
                </li>
                <li>

                    <a href="index.php?tag=gallery">
            <img src="./view/images/couleur-de-l-erable.jpg" alt="Couleur de l’érable - Erin Hanson">
                    </a>
                </li>
                <li>

                    <a href="index.php?tag=gallery">
            <img src="./view/images/nuit-etoilee.jpg" alt="La Nuit étoilée - Van Gogh">
                    </a>
                </li>
                <li>

                    <a href="index.php?tag=gallery">
            <img src="./view/images/la-chabanne.jpg" alt="La chabanne - Marie Bracquemond ">
                    </a>
                </li>
                <li>

                    <a href="index.php?tag=gallery">
            <img src="./view/images/chaumiere-en-normandie.jpg" alt="Chaumière en Normandie - Berthe Morisot">
                    </a>
                </li>
            </ul>
        </div>
        <div class="stroke"></div>

    </section>
    <section id="home-third">
        <p>Une exposition sur l’impressionnisme ça te dit ? Et si l’expo était dans ton téléphone ? Ok, laisse moi t’expliquer… Imagine que tu n’aies qu’à ouvrir une application pour plonger dans l’univers de l’impressionnisme. Bienvenu(e) dans un futur où tout est possible. Tu peux découvrir cette exposition interactive grâce à un dispositif qu’on appelle “?”.</p>
        <a href="index.php?tag=dispositif">Voir le dispositif intéractif</a>
    </section>
    <section id="home-fourth">
        <!-- slider2 -->
        <!-- slider3 artiste -->

        <?php
        // Utilisation des données récupérées
        foreach ($data as $artist) :
        ?>

            <p><?= $artist->name ?></p>

        <?php
        endforeach;
        ?>
    </section>
    <?php
    include 'footer.php'
    ?>



</body>


</html> 