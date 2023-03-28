<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

session_start();

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

        if (isset($_GET["session_login"])) {
			
            $result_login = traiteLogin();
    
            if ($result_login == 1) {
                header('Location: ../index.php');
                exit;
            }
            if ($result_login == 2) {
                header ('Location:admin.php?err=mdp');
            }
            if ($result_login == 3) {
                header ('Location:admin.php?err=login');
            }
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
                "pwd" => $_POST["pwd"]
            );
            addUser($array_POST);
            print_r($array_POST);
        }
    break;

    case "DELETE":
            $id = $_GET["id"];
            deleteUser($id); 
        break;
    
        default :

        break;
}