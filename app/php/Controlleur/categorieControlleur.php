<?php

namespace App;

//use Model\categorie as Categorie;
use PDO;

class categorieControlleur {
    private $db;
    
    function __construct($db) {
        $this->setDb($db);
    }

    function getAll() {
        $qry = $this->db->prepare("SELECT * FROM categories;");
        $qry->execute();
        echo '<p id="catégorie">';
        while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)){
            $categ = new \Model\Categorie($donnees);
            echo $categ->getCategorie().'<br />';          
        };
        echo '</p>';
        echo ' </div></p>';
    }
    
    public function add(){
        
    }
    
    public function update(){
        
    }
    
    public function delete(){
        
    }
    
    public function getOne($id){
        
    }
    
    function setDb($_db) {
        $this->db = $_db;
    }


}
?>


