<?php

namespace Controlleur;

use PDO;

//use Model\categorie as Categorie;
class AdherentControlleur {

    private $db;

    function __construct($db) {
        $this->setDb($db);
    }

    function connexion() {
        if (isset($_POST['identifiant'])) {
            $qry = $this->db->prepare("select login,habilitation,mdp from adherents where login= '" . $_POST['identifiant'] . "'");
            $qry->execute();
            while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                $adherent = new \Model\Adherent($donnees);
                if (!$adherent) {
                    echo '<h1> Mauvais identifiant ou mot de passe ! </h1>';
                } else {
                    if ($_POST['motdepasse'] === $adherent->getMdp()) {
                        $_SESSION['identifiant'] = $adherent->getLogin();
                        header('Location: espaceadherent.php');
                    } else {
                        echo '<h1>Mauvais identifiant ou mot de passe passwdC!</h1>';
                    }
                }
            };
        }
    }

    function deconnexion() {
        if (isset($_POST['deconnexion'])) {
            session_destroy();
            header('Location: espaceadherent.php');
        }
    }

    public function add() {
       if((isset($_POST['motdepasse']))){
//           &(isset($_POST['nom']))&(isset($_POST['prenom']))&(isset($_POST['email']))&(isset($_POST['motdepasse']))&(isset($_POST['categorie']))&(isset($_POST['poste']))&(isset($_POST['habilitation']))
           $new_date = date('Y-m-d', strtotime($_POST['dateNaissance']));
           $surclassement = 1;
           $arbitre = 'f';
           $entrainneur = 'f';
           if(isset($_POST['surclassement'])){
               $surclassement = 0;
           }
           if(isset($_POST['arbitre'])){
               $arbitre = 't';
           }
           if(isset($_POST['entrainneur'])){
               $entrainneur = 't';
           }
           
           header('Location: gestionAdherent.php');
           
           $sql = "insert into adherents (id_categorie,id_poste,login,mdp,nom,prenom,date_naissance,genre,surclassement,habilitation,arbitre,entraineur) "
                   . "values (".$_POST['categorie'].",".$_POST['poste'].",'".$_POST['identifiant']."','".$_POST['motdepasse']."'"
                   . ",'".$_POST['nom']."','".$_POST['prenom']."','".$new_date."','".$_POST['genre']."',".$surclassement.",'".$_POST['habilitation']."','".$arbitre."','".$entrainneur."');";
           $qry = $this->db->prepare($sql);
           $qry->execute();
           return $qry;
           
       } 
    }

    public function update() {
        
    }

    public function delete() {
       if (isset($_POST['suppr'])) {
            $qry = $this->db->prepare('Select * FROM joue WHERE id_adherent=' . $_POST['suppr']. ';');
            $qry->execute();
            $c1 = 0;
            while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                if($c1=0){
                   $qry2 = $this->db->prepare('DELETE FROM joue WHERE id_adherent=' . $_POST['suppr'].';');
                   $qry2->execute(); 
                   $c1++;
                }
            } 
            
            $qry = $this->db->prepare('Select * FROM arbitre WHERE id_adherent=' . $_POST['suppr']. ';');
            $qry->execute();
            $c2 = 0;
            while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                if($c2=0){
                  $qry2 = $this->db->prepare('delete from arbitre where id_adherent=' . $_POST['suppr'].';');
                  $qry2->execute();
                   $c2++;
                }
            } 
            
            $qry = $this->db->prepare('Select * FROM entraine WHERE id_entraineur=' . $_POST['suppr']. ';');
            $qry->execute();
            $c3 = 0;
            while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                if($c3=0){
                  $qry2 = $this->db->prepare('delete from entraine where id_entraineur='. $_POST['suppr'].';');
                  $qry2->execute();
                  $c3++;
                }
            }
            
            $qry = $this->db->prepare('Select * FROM adherents WHERE id_adherent=' . $_POST['suppr']. ';');
            $qry->execute();
            $c4 = 0;
            while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                if($c4=0){
                  $qry2 = $this->db->prepare('delete from adherents where id_adherent='. $_POST['suppr'].';');
                  $qry2->execute();
                  $c4++;
                }
            }
            header("Refresh:0");
        } 
    }

    public function getAll(){
        $qry = $this->db->prepare("SELECT * FROM adherents;");
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


