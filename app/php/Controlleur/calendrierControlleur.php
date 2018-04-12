<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controlleur;

/**
 * Description of calendrierControlleur
 *
 * @author csp20
 */
class calendrierControlleur {

    private $db;

    function __construct($db) {
        $this->setDb($db);
    }

    function query($sql) {
        return $this->db->query($sql);
    }

    function apostropheSession($string) {//change une apostrophe vers un backslash une appostrophe pour les variables de sessions
        $string = preg_replace("~\'~", "\'", $string);
        return $string;
    }

        function EBizzare($string) {//change une apostrophe vers un backslash une appostrophe pour les variables de sessions
        $string = preg_replace("~�~", "E", $string);
        return $string;
    }

    
    function getAll() {
        //     $qry = $this->db->prepare("SELECT * FROM categories;");
        //     $qry->execute();
        //     echo "<div>";
        //     echo '<p id="catégorie">';
        //     while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)){
        //         $categ = new \Model\Categorie($donnees);
        //         echo $categ->getCategorie().'<br />';          
        //     };
        //     echo '</p>';
        //     echo ' </div></p>';
    }

    function getMatch() {
        $sql = ' select id_creneau,debut, fin, salles.nom as "salle",'
                . ' eq.nom as "equipe", '
                . 'nom_equipe_b as "adversaire" '
                . 'from creneaux join salles using(id_salle) '
                . 'join matchs ma using(id_creneau) '
                . 'join equipes eq on ma.id_equipe_a=eq.id_equipe';
        foreach ($this->query($sql) as $row) {
            echo "{
          id: " . $row['id_creneau'] . ",
          title: '" . $row['equipe'] . " contre " . $this->apostropheSession($row['adversaire']) . " (" . $row['salle'] . ")',
          start: '" . $row['debut'] . "',
          end:'" . $row['fin'] . "'    
        },";
        };
    }
    
        function getMatch2() {
        $sql = ' select id_creneau,debut, fin, salles.nom as "salle",'
                . ' eq.nom as "equipe", '
                . 'nom_equipe_b as "adversaire" '
                . 'from creneaux join salles using(id_salle) '
                . 'join matchs ma using(id_creneau) '
                . 'join equipes eq on ma.id_equipe_a=eq.id_equipe';
        
            $qry = $this->db->prepare($sql);
        $qry->execute();
        
     
    }
    
    function InsertionCreneau($debut,$fin,$salle){
    
    
    $sql = "insert into creneaux(debut,fin,id_salle) values( '".$debut."','".$fin."','".$this->getSalle($salle)."');";
    echo $sql;
     $qry = $this->db->prepare($sql);
     $qry->execute();
     
    
    }
    
    
    
    
    

    function getSalle($salle){
        $salle= $this->EBizzare($salle);
        $salle= strtoupper($salle);
        if($salle == "MONASTIE"){
            $id_salle=2;
       
        }elseif ($salle == "RIVIERE") {
            $id_salle=1;
        }else{
            $id_salle=3;
        }
         return $id_salle;
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
