<?php

require ('../model/model.php');

$array_POST = array();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (empty(isset($_GET["id"]))) {
            getUsers();
        } else {
            $id = $_GET["id"];
            getUser($id);
        }
        break;
    
    case 'POST':
        if (isset($_POST["add_user"])) {

            $array_POST= array(
                "login" => $_POST["login"],
                "mail" => $_POST["mail"],
                "name" => $_POST["name"],
                "surname" => $_POST["surname"],
                "birthday" => $_POST["birthday"],
                "date_creation" => $_POST["date_creation"],
                "pwd" => $_POST["pwd"]
 
            );

            addUser($array_POST);
            print_r($array_POST);

        }

        if (isset($_POST["delete_user"])) {

            $id = $_GET["id"];
            deleteUser($id);            

        }
        break;
    
        default :

        break;
}