<?php

namespace Controlleur;

//use Model\categorie as Categorie;
class equipeControlleur {

    private $db;

    function __construct($db) {
        $this->setDb($db);
    }

    function getAll() {
        $qry = $this->db->prepare("SELECT * FROM equipes;");
        $qry->execute();
        return $qry;
    }
    
    function getEquipeNom(){
        $qry = $this->db->prepare("select nom, id_equipe from equipes order by id_equipe;");
        $qry->execute();
        return $qry;
    }

    public function add() {
        
    }

    public function update() {
        
    }

    public function delete() {
        
    }

    public function getOne($id) {
        
    }

    function setDb($_db) {
        $this->db = $_db;
    }

}
?>


