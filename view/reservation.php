<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script defer src="./view/js/app.js"></script>
    <script defer src="./view/js/functions.js"></script>
    <!-- lien vers le script JavaScript de Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="./view/style/style.css">
    <title>Réservation</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <section id="reservation-first">
        <h1>Réservation</h1>
        <form action="./api/basket.php" method="POST">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date_visit" onchange="calculPrix()" class="flatpickr hide-input"><br><br>
    </section>
    <section id="reservation-second">
        <br><br>
            <div class="ticket">
                <div class="ticket-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Tristique nulla aliquet enim tortor at auctor. Magnis dis parturient montes </p>
                </div>
                <div class="ticket-price">
                    <label for="nb_billets">Nombre de billets :</label>
                    <select id="nb_billets" name="nb_billets" onchange="calculPrix()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <label for="prix_total">Prix total :</label>
                        <input type="text" id="prix_total" name="prix_total" readonly><br><br>
                </div>
            </div>

<div ticket-button>
        <?php if (isset($_SESSION['login'])) : ?>
            <input type="submit" value="Réserver">
            <input type="hidden" name="id_user" value="<?= $_SESSION["id"] ?>">
            <input type="hidden" name="add_basket">
        <?php else : ?>
            <a href="./index.php?tag=account&action=login">Connecter vous pour réserver !</a>
        <?php endif; ?>
</div>
        </form>

        <?php
        if (isset($_GET["action"])) :

            $action = $_GET["action"];

            if ($action === "succes") :
        ?>

                <p>Réservation réussie</p>

            <?php
            endif;
            if ($action === "erreur") :
            ?>
                <p>Erreur lors de la réservation</p>
        <?php
            endif;
        endif;
        ?>
    </section>

    <script>
        flatpickr(".flatpickr", {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: "fr",
            inline: true
        });

        function calculPrix() {
            var nb_billets = parseInt(document.getElementById("nb_billets").value);
            var prix_total = nb_billets * 15;
            document.getElementById("prix_total").value = prix_total + " €";
        }
    </script>
</body>

</html>