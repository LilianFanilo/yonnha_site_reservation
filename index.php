<?php
session_start();
require("model/start.php");

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

    if ($tag === "login") 
    {
        include './view/login.php';
    }

    if ($tag === "signup") 
    {
        include './view/signup.php';
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