<?php
session_start();
require ('../model/model.php');

$array_POST = array();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET': 
    if (empty(isset($_GET["id"]))) {
        getBaskets();
    } else {
        getBasket($id);
    }

    break;
    
    case 'POST':

        if (isset($_POST["add_basket"])) {
            // Ajouter la valeur de la variable de session "id" dans le tableau $_POST
            $array_POST= array(
                "date_visit" => $_POST["date_visit"],
                "hour" => $_POST["hour"],
                "prix_total" => $_POST["prix_total"],
                "nb_billets" => $_POST["nb_billets"],
                "id_user" => $_POST["id_user"]
            );
            addBasket($array_POST);
            print_r($array_POST);
        }
        
        break;
    
        default :

        break;
}