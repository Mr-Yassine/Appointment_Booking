<?php


//connexion avec la BD
class connection{
    
    public $servername='localhost';
    public $dbname='reservation';
    public $user='root';
    public $pass='';

    public function connect(){

        try {
           $DataBase = new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->user, $this->pass);
           return $DataBase;
           
        }catch (PDOException $e) {
            print "Erreur :" . $e->getMessage() . "<br>";
        }
    }
}
