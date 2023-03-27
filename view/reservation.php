<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- lien vers le script JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="./view/style/style.css">
    <title>Réservation</title>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>

<form action="./api/basket.php" method="POST">
		<label for="date">Date :</label>
		<input type="date" id="date" name="date_visit" onchange="calculPrix()" class="flatpickr hide-input"><br><br>

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
		</select><br><br>

		<label for="prix_total">Prix total :</label>
		<input type="text" id="prix_total" name="prix_total" readonly><br><br>

<?php if (isset($_SESSION['login'])) : ?>
        <input type="submit" value="Réserver">
        <input type="hidden" name="add_basket">
<?php else : ?>
        <a href="./index.php?tag=account&action=login">Connecter vous pour réserver !</a>
<?php endif; ?>

	</form>
    <script>
	flatpickr(".flatpickr", {
		enableTime: false,
		dateFormat: "Y-m-d",
		minDate: "today",
		locale: "fr",
		inline: true
	});
</script>

	<script>
		function calculPrix() {
			var nb_billets = parseInt(document.getElementById("nb_billets").value);
			var prix_total = nb_billets * 15;
			document.getElementById("prix_total").value = prix_total + " €";
		}
	</script>
</body>
</html>