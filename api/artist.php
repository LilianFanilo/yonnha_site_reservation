<?php

require ('../model/model.php');

$array_POST = array();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (empty(isset($_GET["id"]))) {
            getArtists();
        } else {
            $id = $_GET["id"];
            getArtist($id);
        }
        break;
    
    case 'POST':
        if (isset($_POST["add_artist"])) {

            $array_POST= array(
                "name" => $_POST["name"],
                "date" => $_POST["date"],
                "description" => $_POST["description"],
                "img" => $_POST["img"],
            );

            addArtist($array_POST);
            print_r($array_POST);

        }

        if (isset($_POST["delete_artist"])) {

            $id = $_GET["id"];
            deleteArtist($id);            

        }
        break;
    
        default :

        break;
}