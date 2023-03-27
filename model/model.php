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
            $_SESSION["id"] = $result["id_user"];
            $_SESSION['is_admin'] = $result["is_admin"];
            return 1;
        } else {return 2;}
    } else {return 3;}
};

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

//* Peintures

function getPaintings() 
{
    global $db;
    $requete= $db -> prepare("SELECT * FROM painting");
    $requete -> execute();
    $data = $requete -> fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function getPainting($id) 
{
    global $db;
    $requete = $db->prepare('SELECT * FROM painting WHERE id = :id');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    $data = $requete->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);

}

//* Billets

function getBillets() 
{
    global $db;
    $requete= $db -> prepare("SELECT * FROM billet");
    $requete -> execute();
    $data = $requete -> fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function getBillet($id) 
{
    global $db;
    $requete = $db->prepare('SELECT * FROM billet WHERE id = :id');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    $data = $requete->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);

}