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
    <meta name="description" content="Yonnha présente sa toute nouvelle exposition: La révolution en couleur"/>

    <title>Yonnha - Artistes</title>
    
    <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
    <link rel="stylesheet" href=" ./view/style/style.css">
    <script defer src="./view/js/app.js"></script>
    <script defer src="./view/js/functions.js"></script>
</head>
<header>
        <?php
        include 'navbar.php';
        ?>
    </header>

<body>

    <?php
    // Utilisation des données récupérées
    foreach ($data as $artist) :
    ?>
        <section id="artistes-<?= $artist->id ?>">
            <div class="artistes content">
                <div class="artistes img">
                    <img src="<?= $artist->img ?>" alt="<?= $artist->name ?>">
                    <p><?= $artist->citation ?></p>

                </div>

                <div class="artistes text">


                    <h1><?= $artist->name ?></h1>
                    <div class="artiste stroke"></div>
                    <p><?= $artist->date ?></p <p><?= $artist->description ?></p><br>
                    <p><?= $artist->peinture ?></p><br>

                    <p><?= $artist->anecdote ?></p><br>
                </div>
            </div>
        </section>



    <?php
    endforeach;
    ?>

    </section>
    <?php
    include 'footer.php'
    ?>
</body>

</html>