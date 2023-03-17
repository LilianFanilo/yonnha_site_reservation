<?php
    session_start();
    require dirname(__DIR__) ."/model/start.php";

    $request_method = $_SERVER["REQUEST_METHOD"];
    switch ($request_method) 
    {       
        case 'GET':
        if (isset($_GET['tri'])) 
        {

            $tri = $_GET['tri'];

            if ($tri === "a-z") 
            {

            }

            if ($tri === "recent") 
            {

            }

            if ($tri === "good_client") 
            {

            }
        }

        break;
    
        case 'POST':

        break;
    }