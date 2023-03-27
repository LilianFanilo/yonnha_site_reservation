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
            $id = $_GET["id"];
            getBasket($id);
        }
    break;
    
    case 'POST':

        if (isset($_POST["add_basket"])) {

            $array_POST= array(
                "date_visit" => $_POST["date_visit"],
                "prix_total" => $_POST["prix_total"],
                "nb_billets" => $_POST["nb_billets"],
                "id_user" => ,
 
            );

            addBasket($array_POST);
            print_r($array_POST);

        }

        if (isset($_POST["delete_basket"])) {

            $id = $_GET["id"];
            deleteBasket($id);            

        }
        
        break;
    
        default :

        break;
}