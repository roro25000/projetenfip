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
    function getColor($id){
        
         switch ($id){
        case "1" :
            $color='799dd8';
            break;
        case "2" :
            $color='74bc89';
            break;
        case "3" :
            $color='90b771';
            break;
        case "4" :
            $color='71b7b3';
            break;
        case "5" :
            $color='71a2b7';
            break;
        case "6" :
            $color='b77171';
            break;
        case "7" :
            $color='b77171';
            break;
        case "8" :
            $color='b7ae71';
            break;
        case "9" :
            $color='a0b771';
            break;
        case "10" :
            $color='717ab7';
            break;
        case "11" :
            $color='8a71b7';
            break;
        case "12" :
            $color='b171b7';
            break;
        case "13" :
            $color='b7717d';
            break;
        case "14" :
            $color='b771a4';
            break;
        case "15" :
            $color='71adb7';
            break;
        case "16" :
            $color='71b791';
            break;
        case "17" :
            $color='c7e5b3';
            break;
        default :
            $color='ffdead';
        }
        //case 
        return $color;
        
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

    function getMatch($equipe_id) {
        if($equipe_id != 0){
            $sql= ' select id_creneau,debut, fin, salles.nom as "salle",'
                . ' eq.nom as "equipe", id_equipe,'
                . 'nom_equipe_b as "adversaire" '
                . 'from creneaux join salles using(id_salle) '
                . 'join matchs ma using(id_creneau) '
                . 'join equipes eq on ma.id_equipe_a=eq.id_equipe '
                . 'where id_equipe='.$equipe_id;
          
        }else
            
        {
           $sql = ' select id_creneau,debut, fin, salles.nom as "salle",'
                . ' eq.nom as "equipe", id_equipe,'
                
                . 'nom_equipe_b as "adversaire" '
                . 'from creneaux join salles using(id_salle) '
                . 'join matchs ma using(id_creneau) '
                . 'join equipes eq on ma.id_equipe_a=eq.id_equipe';
        }
        foreach ($this->query($sql) as $row) {
            echo "{
          id: " . $row['id_creneau'] . ",         
          title: '" . $this->apostropheSession($row['adversaire']) . " à  " . $row['salle'] . " ("  . $row['equipe'] .  ")',
          start: '" . $row['debut'] . "',
          end:'" . $row['fin'] . "',
          color:'".$this->getColor($row['id_equipe'])."'
        },";
        };
    }
    function InversionScore($str){
       
        return strrev($str);
    }
    function InversionTotal($str){
        $tab=explode("-",$str);
        return $tab[1]."-".$tab[0];
    }
    function InversionSet($str){
        $tab=  explode(",", $str);
        $re="";
   
        if (! isset($tab[3])) {
            $re= $this->InversionTotal($tab[0]).",".$this->InversionTotal($tab[1]).",".$this->InversionTotal($tab[2]);
        }
        elseif (! isset($tab[4])){
            $re= $this->InversionTotal($tab[0]).",".$this->InversionTotal($tab[1]).",".$this->InversionTotal($tab[2]).",".$this->InversionTotal($tab[3]);
        }
       else{
                  $re= $this->InversionTotal($tab[0]).",".$this->InversionTotal($tab[1]).",".$this->InversionTotal($tab[2]).",".$this->InversionTotal($tab[3]).",".$this->InversionTotal($tab[4]); 
        }
        
        return $re;
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
        $defaite=0;
        $point=0;
        $victoire=0;

        $this->maxIdCreneau();
      
        $sql = "insert into matchs(id_match,id_equipe_a,id_creneau,score,set,total,nom_equipe_b) values( '".$idMatch."','".$id_equipe_A."','".$creneau."','".$set."','".$score."','".$total."','".$nom_equipe_b."');";
   
 
        $qry = $this->db->prepare($sql);
        $qry->execute();
        
        
        echo $set;
        $tab=  explode("/", $set);
        echo $tab[0]."-".$tab[1];
        if ($tab[0]==3 && $tab[1]==2){
            $point=point+2;
            $victoire++;
            
        }elseif ($tab[0] == 3){
            $victoire++;
            $point=$point+3;
            
        }else{
            
                $point++;
                $defaite++;
           
        }
        
        $this->MAJpoint($point,$victoire,$defaite,$id_equipe_A);
        
      

    }
    
    function MAJpoint($point,$victoire,$defaite,$id_equipe){
        $sql = "update equipes set points=points+'".$point."' , victoires=victoires+'".$victoire."' , defaites=defaites+'".$defaite."'  where id_equipe = '".$id_equipe."';";
         //  echo $sql;
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
