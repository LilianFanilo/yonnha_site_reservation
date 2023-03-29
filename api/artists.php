<?php
session_start();

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

        break;
    
        default :
        http_response_code(405);
        echo "Error 405: Method Not Allowed";
        break;
}