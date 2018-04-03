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


