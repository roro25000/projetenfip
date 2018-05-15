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
        $string = preg_replace(   "/\?/", "E", $string);
      
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
          title: '" . $row['equipe'] . " vs " . $this->apostropheSession($row['adversaire']) . " (" . $row['salle'] . ")',
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
    function InversionScore($str){
        $un="";
        $trois="";
        $carac="/";
        $tab=explode($carac, $str);
        $un=$tab[1];
        $trois=$tab[0];
        
        return $un.$carac.$trois;
    }

    function InsertionCreneau($hdebut,$ddebut,$hfin,$dfin,$salle){

        $datedebut=  date($ddebut." ".$hdebut);
        $date = new \DateTime();
        $datetimeFormat = 'Y-m-d H:i';
        $h =  substr($hfin,1,1)+2;
        $hfin = substr($hfin,0,1).$h.substr($hfin,2);
        $datefin = date($dfin." ".$hfin);
    
     //   echo $this->getSalle($salle);
        $sql = "insert into creneaux(debut,fin,id_salle) values( '".$datedebut."','".$datefin."','".$this->getSalle($salle)."');";
        $qry = $this->db->prepare($sql);
        $qry->execute();
    }
    function insertionMatch($idMatch,$id_equipe_A,$set,$score,$total,$nom_equipe_b,$creneau){


        $this->maxIdCreneau();
      
        $sql = "insert into matchs(id_match,id_equipe_a,id_creneau,score,set,total,nom_equipe_b) values( '".$idMatch."','".$id_equipe_A."','".$creneau."','".$set."','".$score."','".$total."','".$nom_equipe_b."');";
   
  //      
  //      echo $sql;
        $qry = $this->db->prepare($sql);
        $qry->execute();
        


    }
    
    function MAJpoint($point,$victoire,$defaite,$null,$id_equipe){
        $sql = "update equipes set points=points+'".$point."' , victoires=victoires+'".$victoire."' , defaites=defaites'".$defaite."' , nulls=nulls'".$null."'  where id_equipe = '".$id_equipe."';";
        //   echo $sql;
        $qry = $this->db->prepare($sql);
        $qry->execute();
        
    }
    
    
    function maxIdCreneau(){
        $sql = "select max(id_creneau) as max from creneaux;";
        $qry = $this->db->query($sql);
        $donnees = $qry->fetch();
        return $donnees['max'];
    }


    function getSalle($salle){
     
       $salle =mb_convert_encoding($salle,"UTF-8"); 
          $salle= $this->EBizzare($salle);
        $salle= strtoupper($salle);
        switch ($salle){
        case "MONASTIE" :
            $id_salle=2;
            break;
        case "RIVIERE" :
            $id_salle=1;
            break;
        default:
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
