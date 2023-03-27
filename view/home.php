<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yonnha</title>
    <link rel="icon" href="./view/images/logo_yonnha.png" type="image/icon type">
    <link rel="stylesheet" href=" ./view/style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"></script>

    <script defer  src="./view/js/app.js"></script>
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
        <!-- slider gsap -->
    </section>
    <section id="home-third">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Tristique nulla aliquet enim tortor at auctor. Magnis dis parturient montes </p>
        <a href="">Voir le dispositif intéractif</a>
    </section>
    <section id="home-fourth">
        <!-- slider2 -->
        <!-- slider3 artiste -->
    </section>
<?php 
include 'footer.php'
?>



</body>


</html>