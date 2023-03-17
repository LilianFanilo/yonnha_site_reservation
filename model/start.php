<?php
    $db = new PDO("mysql:host=localhost;dbname=yonnha_db;port=3306;charset=utf8",'root','');

    function chargerClasse($classe)
    {
        require_once 'Class/'.$classe . '.php';
    }
    spl_autoload_register('chargerClasse');

    $userManager = new UserManager($db);
?>