<?php

class UserManager 
{
    private $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function getList() 
    {
        $users = [];
        $query = $this->db->query('SELECT * FROM personnages ORDER BY nom');
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($donnees);
        }
        return $users;
    }

    public function getOne($id) 
    {
        $query = $this->db->prepare('SELECT * FROM personnages WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data !== false) {
            return new User($data);
        } else {
            return null;
        }
    }

    public function deleteUser($id) 
    {
        $query = $this->db->prepare('DELETE FROM personnages WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    // public function insertUser($name, $img, $atk, $pv) 
    // {
    //     $query = $this->db->prepare('INSERT INTO personnages (nom, img, atk, pv, currentPV) VALUES (:name, :img, :atk, :pv, :currentPV)');
    //     $query->bindValue(':name', $name, PDO::PARAM_STR);
    //     $query->bindValue(':img', $img, PDO::PARAM_LOB);
    //     $query->bindValue(':atk', $atk, PDO::PARAM_INT);
    //     $query->bindValue(':pv', $pv, PDO::PARAM_INT);
    //     $query->bindValue(':currentPV', $pv, PDO::PARAM_INT);
    //     $query->execute();
    // }

    // public function resetUser(User $perso){
    //     $query = $this->db->prepare('UPDATE personnages SET nom = :name, img = :img, atk = :atk, pv = :pv, currentPV = :currentPV WHERE id = :id');
    //     $query->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
    //     $query->bindValue(':name', $perso->getNom(), PDO::PARAM_STR);
    //     $query->bindValue(':img', $perso->getImg(), PDO::PARAM_LOB);
    //     $query->bindValue(':atk', $perso->getAtk(), PDO::PARAM_INT);
    //     $query->bindValue(':pv', $perso->getPV(), PDO::PARAM_INT);
    //     $query->bindValue(':currentPV', $perso->getPV(), PDO::PARAM_INT);
    //     $query->execute();
    //     }

    // public function updateUser(User $perso){
    //     $query = $this->db->prepare('UPDATE personnages SET nom = :name, img = :img, atk = :atk, pv = :pv, currentPV = :currentPV WHERE id = :id');
    //     $query->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
    //     $query->bindValue(':name', $perso->getNom(), PDO::PARAM_STR);
    //     $query->bindValue(':img', $perso->getImg(), PDO::PARAM_LOB);
    //     $query->bindValue(':atk', $perso->getAtk(), PDO::PARAM_INT);
    //     $query->bindValue(':pv', $perso->getPV(), PDO::PARAM_INT);
    //     $query->bindValue(':currentPV', $perso->getCurrentPV(), PDO::PARAM_INT);
    //     $query->execute();
    //     }

        public function ModifUser($id, $name, $atk, $pv)
        {
            $query = $this->db->prepare('SELECT nom, atk, pv FROM personnages WHERE id = :id');
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $nom = empty($name) ? $result['nom'] : $name;
            $attaque = empty($atk) ? $result['atk'] : $atk;
            $points_de_vie = empty($pv) ? $result['pv'] : $pv;
            $query = $this->db->prepare('UPDATE personnages SET nom = :name, atk = :atk, pv = :pv, currentPV = :pv WHERE id = :id');
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':name', $nom, PDO::PARAM_STR);
            $query->bindValue(':atk', $attaque, PDO::PARAM_INT);
            $query->bindValue(':pv', $points_de_vie, PDO::PARAM_INT);
            $query->execute();
        }
        

        public function traiteLogin($array_POST) 
        {
            global $db;
            extract($array_POST);
            $db->query('SET NAMES utf8');   
            $requete="SELECT * FROM user WHERE login=:login";
            $stmt=$db->prepare($requete);
            $stmt->bindParam(':login',$login, PDO::PARAM_STR);
            $stmt->execute();   
            if ($stmt->rowcount()==1){
                $result=$stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($pwd,$result["pwd"])){
                    $_SESSION["login"]=$login;
                    $_SESSION["id"] = $result["id_user"];
                    $_SESSION['is_admin'] = $result['is_admin'];
                    return 1;
                } else {return 2;}
            } else {return 3;}
        }

                //Inscription
        public function traiteInscription($array_POST)
        {
            global $db;
            extract($array_POST);
            $current_date = date('Y/m/d H:i:s');
            $requete= "INSERT INTO user VALUES (NULL,:login,:mail,:name,:surname,:birthday,:date_creation,:pwd,NULL)";
            $stmt= $db->prepare($requete);
            $stmt->bindParam(':login',$login , PDO::PARAM_STR); 
            $stmt->bindParam(':mail',$mail , PDO::PARAM_STR); 
            $stmt->bindParam(':name',$name , PDO::PARAM_STR); 
            $stmt->bindParam(':surname',$surname , PDO::PARAM_STR);
            $stmt->bindParam(':birthday',$birthday , PDO::PARAM_STR);
            $stmt->bindParam(':date_creation',$current_date, PDO::PARAM_STR);
            $hash= password_hash($pwd,PASSWORD_DEFAULT);
            $stmt->bindParam(':pwd',$hash , PDO::PARAM_STR); 
            $stmt->execute();
            return 1;
        }

}
?>