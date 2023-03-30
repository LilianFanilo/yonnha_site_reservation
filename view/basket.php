<?php
    $id= $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yonnha présente sa toute nouvelle exposition: La révolution en couleur"/>
    <title>Panier</title>
    <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
    <link rel="stylesheet" href=" ./view/style/style.css">
    <script defer src="./view/js/app.js"></script>
    <script defer src="./view/js/functions.js"></script>
</head>
<body>
    <?php
        include 'navbar.php';

//récupération des données de l'api => ici users
$url = $api_url."/baskets/{$id}";

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if($response === false){
    $error = curl_error($curl);
    curl_close($curl);
    die("Erreur lors de l'appel à l'API : ".$error);
}

$data = json_decode($response);

curl_close($curl);

?>

<?php if(!empty($data)): ?>
    <section id="basket">
    <h1>Panier</h1>
        <div class="table-content">
    <table>
        <thead>
            <tr>
                <th>Date de réservation</th>
                <th>Nombre de billets</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $basket) : ?>
            <tr>
                <td><?= $basket->date_visit ?></td>
                <td><?=  $basket->nb_billets ?></td>
                <td><?=  $basket->prix_total ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun résultat trouvé.</p>
<?php endif; ?>
</div>
</section>


</body>

<?php
    include 'footer.php'
    ?>

</html>