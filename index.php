<?php
session_start();
require "./model/model.php";
$api_url = "http://localhost/yonnha_hope/api";

if (isset($_GET['tag'])) 
{
    $tag = $_GET['tag'];

    if ($tag === "gallery") 
    {
        include './view/gallery.php';
    }
     
    if ($tag === "reservation") 
    {
        include './view/reservation.php';
    }

    if ($tag === "contact") 
    {
        include './view/contact.php';
    }

    if ($tag === "account") 
    {
        include './view/account.php';
    }

    if ($tag === "logout") 
    {
        include './view/logout.php';
    }

    if ($tag === "gestion_panel") 
    {
        include './view/gestion_panel.php';
    }

} else {
    include './view/home.php';
}