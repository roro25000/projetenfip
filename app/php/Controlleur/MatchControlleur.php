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
        $qry = $this->db->prepare('select equipes.nom as "nom_equipe_a",id_match,id_equipe_a,id_creneau,score,set,total,nom_equipe_b from matchs,equipes where equipes.id_equipe=id_equipe_a;');
        $qry->execute();
        return $qry;
    }
    
    
    public function getOne($id) {
        
    }

    function setDb($_db) {
        $this->db = $_db;
    }

}
?>


