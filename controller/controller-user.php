<?php
	session_start();
	require dirname(__DIR__) ."/model/start.php";

    $request_method = $_SERVER["REQUEST_METHOD"];
    switch ($request_method) 
    {
        case 'GET':
            if (isset($_GET['session_login'])) {
                $session_login = $_GET['session_login'];
                if ($session_login === "logout") {
                    session_destroy();
                    header("Location: ../index.php?tag=logout");
                }
            }

        break;
        
        case 'POST':

            if (isset($_POST['session_login'])) 
            {       
                $array_POST= array(
                    "login" => $_POST["login"],
                    "pwd" => $_POST["pwd"]
                );

                $result_login = $userManager->traiteLogin($array_POST);

                print_r($array_POST);
        
                if ($result_login == 1) 
                {
                    if (isset($_SESSION['login']) && $_SESSION['is_admin'] == true) {
                        header('Location: ../index.php?tag=gestion_panel');
                        exit;
                     } else {
                        header('Location: ../index.php');
                        exit;
                     }
                }
        
                if ($result_login == 2) 
                {
                    header ('Location:index.php?err=mdp');
                }
        
                if ($result_login == 3) 
                {
                    header ('Location:index.php?err=login');
                }
            }

            if (isset($_POST['session_inscription'])) 
            {
                $array_POST= array(
                    "login" => $_POST["login"],
                    "mail"=> $_POST["mail"],
                    "name" => $_POST["name"],
                    "surname" => $_POST["surname"],
                    "birthday" => $_POST["birthday"],
                    "pwd" => $_POST["pwd"]
                );

                $result_insc = $userManager->traiteInscription($array_POST);

                print_r($array_POST);
        
                if ($result_insc == 1) 
                {
                    echo "L'inscription s'est bien déroulée<br> <a href=\"../index.php\">Connectez-vous!</a> <a href=\"../index.php\">Direction l'accueil</a>";
                }
            }

        break;
    }
?>