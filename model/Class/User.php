<?php

class User {

//* Initialisation des variables

    protected static $compteur;

    protected $id;
    protected $login;
    protected $mail;
    protected $name;
    protected $surname;
    protected $birthday;
    protected $date_creation;
    protected $pwd;
    protected $id_basket;
    protected $is_admin;

    public static function getCompteur()
    {
    echo self::$compteur;
    }

//* Fonction d'hydratation

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) 
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) 
            {
            $this->$method($value);
            }
        }
    }

    public function __construct(array $donnees){
        $this -> hydrate($donnees);
        self::$compteur++;
    }

//* Insertion des valeurs

    public function setId(int $id){
        $this->id=$id;
    }
    
    public function setLogin(int $login){
        $this->login=$login;
    }
    
    public function setMail(string $mail){
        $this->mail=$mail;
    }

    public function setName(string $name){
        $this->name=$name;
    }

    public function setSurname(string $surname){
        $this->surname=$surname;
    }

    public function setBirthday(int $birthday){
        $this->birthday=$birthday;
    }

    public function setDateCreation(int $date_creation){
        $this->date_creation=$date_creation;
    }

    public function setPassword(int $pwd){
        $this->pwd=$pwd;
    }

    public function setId_Basket(int $id_basket){
        $this->id_basket=$id_basket;
    }

    public function setIs_Admin(int $is_admin){
        $this->is_admin=$is_admin;
    }

//* Récupération des valeurs

    public function getId(){
        return $this->id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getMail(){
        return $this->mail;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getBirthday(){
        return $this->birthday;
    }

    public function getDateCreation(){
        return $this->date_creation;
    }

    public function getPassword(){
        return $this->pwd;
    }

    public function getId_Basket(){
        return $this->id_basket;
    }

    public function getIs_Admin(){
        return $this->is_admin;
    }

}