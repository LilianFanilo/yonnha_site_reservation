<?php
    $db = new PDO("mysql:host=localhost;dbname=yonnha_db;port=3306;charset=utf8",'root','');
    $db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


    //* Utilisateurs

    function getUsers() 
    {
        global $db;
        $requete= $db -> prepare("SELECT * FROM user");
        $requete -> execute();
        $data = $requete -> fetchAll(PDO::FETCH_OBJ);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        header("Access-Control-Allow-Origin: *");
    }

    function getUser($id) 
    {
        global $db;
        $requete = $db->prepare('SELECT * FROM user WHERE id = :id');
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();

        $data = $requete->fetch(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);        
        header("Access-Control-Allow-Origin: *");

    }

    function addUser($array_POST){
        global $db;
        extract($array_POST);
        $now = date("Y-m-d H:i:s");
        $requete = $db->prepare('INSERT INTO user (login, mail, name, surname, birthday, pwd, date_creation) VALUES (:login, :mail, :name, :surname, :birthday, :pwd, :date_creation)');
        $requete->bindValue(':login', $login, PDO::PARAM_STR);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
        $requete->bindValue(':name', $name, PDO::PARAM_STR);
        $requete->bindValue(':surname', $surname, PDO::PARAM_STR);
        $requete->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        $hash= password_hash($pwd,PASSWORD_DEFAULT);
        $requete->bindParam(':pwd',$hash , PDO::PARAM_STR);
        $requete->bindParam(':date_creation', $now, PDO::PARAM_STR);
        
        if ($requete->execute())
        {
            $response=array(
                'status' => 1,
                'status_message' => 'Utilisateur ajouté avec succès.'
            );
            header("Location: ../index.php?tag=account&action=login&result=succes");
        }
        else
        {
            $response = array (
                'status' => 0,
                'status_message' => 'ERREUR'
            );
            header("Location: ../index.php?tag=account&action=login&result=erreur");

        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    

function traiteLogin(){
    global $db;
    $db->query('SET NAMES utf8');   
    $requete="SELECT * FROM user WHERE login=:login";
    $stmt=$db->prepare($requete);
    $stmt->bindParam(':login',$_GET["login"], PDO::PARAM_STR);
    $stmt->execute();   
    if ($stmt->rowcount()==1){
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_GET["pwd"],$result["pwd"])){
            $_SESSION["login"]=$_GET["login"];
            $_SESSION["id"] = $result["id"];
            $_SESSION['is_admin'] = $result["is_admin"];
            return 1;
        } else {return 2;}
    } else {return 3;}
};

function Userlogout(){
    session_destroy();
    header('Location: ../index.php?tag=account&action=logout');
}


 function deleteUser($id) 
{
    global $db;
    $requete = $db->prepare('DELETE FROM user WHERE id = :id');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    if ($requete->execute())
    {
        $response=array(
            'status' => 1,
            'status_message' => 'Utilisateur supprime avec succes'
        );

    }
    else
    {
        $response = array (
            'status' => 0,
            'status_message' => 'ERREUR'
        );

    }
    header('Content-Type: application/json');
    echo json_encode($response);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
}



function getUserBasket() 
{
    global $db;
    $requete = $db->prepare("SELECT * FROM basket WHERE id_user=:id_user");
    $requete->bindValue(':id_user', $_SESSION["id"], PDO::PARAM_INT);
    $requete->execute();
    $data = $requete->fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}
//* Paniers

function getBaskets() 
{
    global $db;
    $requete= $db -> prepare("SELECT * FROM basket");
    $requete -> execute();
    $data = $requete -> fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function getBasket($id) 
{
    global $db;
    $requete = $db->prepare('SELECT * FROM basket WHERE id = :id');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    $data = $requete->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);

}

function addBasket($array_POST){

    global $db;
    extract($array_POST);
    $requete = $db->prepare('INSERT INTO basket (id_user, prix_total, nb_billets, date_visit, hour, date_purchase) VALUES (:id_user, :prix_total, :nb_billets, :date_visit, :hour, NOW())');
    $requete->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $requete->bindValue(':prix_total', $prix_total, PDO::PARAM_STR);
    $requete->bindValue(':nb_billets', $nb_billets, PDO::PARAM_STR);
    $requete->bindValue(':date_visit', $date_visit, PDO::PARAM_STR);
    $requete->bindValue(':hour', $hour, PDO::PARAM_STR);
    
    if ($requete->execute())
    {
        $response=array(
            'status' => 1,
            'status_message' => 'Reservation ajoute avec succes.'
        );
        header("Location: ../index.php?tag=reservation&action=succes");

    }
    else
    {
        $response = array (
            'status' => 0,
            'status_message' => 'ERREUR'
        );
        header("Location: ../index.php?tag=reservation&action=erreur");

    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


function deleteBasket($id) 
{
    global $db;
    $requete = $db->prepare('DELETE FROM personnages WHERE id = :id');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    if ($requete->execute())
    {
        $response=array(
            'status' => 1,
            'status_message' => 'Utilisateur supprimé avec succès'
        );
    }
    else
    {
        $response = array (
            'status' => 0,
            'status_message' => 'ERREUR'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


//* Artistes

function getArtists() 
{
    global $db;
    $requete= $db -> prepare("SELECT * FROM artist");
    $requete -> execute();
    $data = $requete -> fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function getArtist($id) 
{
    global $db;
    $requete = $db->prepare('SELECT * FROM artist WHERE id = :id');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    $data = $requete->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);

}
