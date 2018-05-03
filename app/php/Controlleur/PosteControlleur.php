<?php

namespace Controlleur;

use PDO;

class PosteControlleur {

    private $db;

    function __construct($db) {
        $this->setDb($db);
    }

    function getAll() {
        $qry = $this->db->prepare("SELECT * FROM postes;");
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


