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
        
        break;
    
        default :

        break;
}