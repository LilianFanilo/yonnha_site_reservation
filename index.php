<?php
session_start();
require "./model/model.php";
$api_url="http://localhost/yonnha_site_reservation/api";
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

    if ($tag === "basket") 
    {
        include './view/basket.php';
    }

    if ($tag === "gestion_panel") 
    {
        header("Location: ./view/back_office/build");
    }

} else {
    include './view/home.php';
}