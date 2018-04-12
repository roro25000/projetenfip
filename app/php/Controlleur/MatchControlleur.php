<?php

namespace Controlleur;

use PDO;

//use Model\categorie as Categorie;
class MatchControlleur {

    private $db;

    function __construct($db) {
        $this->setDb($db);
    }

    public function add() {
        
    }

    public function update() {
        
    }

    public function delete() {
        
    }

    public function getAll(){
        $qry = $this->db->prepare('SELECT m.*, e.nom AS "nom_equipe_a" FROM matchs m'
                . 'JOIN equipes e ON e.id_equipe= m.id_equipe_a;');
        
        $qry->execute();
        while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                echo $donnees;
        }
        return $qry;
    }
    
    
    public function getOne($id) {
        
    }

    function setDb($_db) {
        $this->db = $_db;
    }

}
?>


