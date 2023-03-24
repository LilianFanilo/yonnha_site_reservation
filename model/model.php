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

    }

    function addUser($array_POST){

        global $db;
        extract($array_POST);
        $requete = $db->prepare('INSERT INTO user (login, mail, name, surname, birthday, date_creation, pwd) VALUES (:login, :mail, :name, :surname, birthday, date_creation, pwd)');
        $requete->bindValue(':login', $login, PDO::PARAM_STR);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
        $requete->bindValue(':name', $name, PDO::PARAM_STR);
        $requete->bindValue(':surname', $surname, PDO::PARAM_STR);
        $requete->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        $requete->bindValue(':date_creation', $date_creation, PDO::PARAM_INT);
        $requete->bindValue(':pwd', $pwd, PDO::PARAM_INT);
        
    if ($requete->execute())
    {
        $response=array(
            'status' => 1,
            'status_message' => 'Utilisateur ajoute avec succes.'
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

 function deleteUser($id) 
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




//* Paniers

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

function addArtist($array_POST){

    global $db;
    extract($array_POST);
    $requete = $db->prepare('INSERT INTO user (login, mail, name, surname, birthday, date_creation, pwd) VALUES (:login, :mail, :name, :surname, birthday, date_creation, pwd)');
    $requete->bindValue(':login', $login, PDO::PARAM_STR);
    $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
    $requete->bindValue(':name', $name, PDO::PARAM_STR);
    $requete->bindValue(':surname', $surname, PDO::PARAM_STR);
    $requete->bindValue(':birthday', $birthday, PDO::PARAM_STR);
    $requete->bindValue(':date_creation', $date_creation, PDO::PARAM_INT);
    $requete->bindValue(':pwd', $pwd, PDO::PARAM_INT);
    
if ($requete->execute())
{
    $response=array(
        'status' => 1,
        'status_message' => 'Utilisateur ajoute avec succes.'
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

function deleteArtist($id) 
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

//* Billets