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
           $qry = $this->db->prepare("insert into adherents (id_categorie,id_poste,login,mdp,nom,prenom,date_naissance,genre,surclassement,habilitation,arbitre,entraineur) "
                   . "values ('".$_POST['categorie']."',".$_POST['poste'].",".$_POST['identifiant'].",'".$_POST['motdepasse']."'"
                   . ",'".$_POST['nom']."','".$_POST['prenom']."',".$_POST['dateNaissance'].",'".$_POST['dateNaissance']."',".$_POST['surclassement'].",".$_POST['habilitation'].",f,f);");
           echo "insert into adherents (id_categorie,id_poste,login,mdp,nom,prenom,date_naissance,genre,surclassement,habilitation,arbitre,entraineur) "
                   . "values (".$_POST['categorie'].",".$_POST['poste'].",".$_POST['identifiant'].",'".$_POST['motdepasse']."'"
                   . ",'".$_POST['nom']."','".$_POST['prenom']."',".$_POST['dateNaissance'].",'".$_POST['dateNaissance']."',".$_POST['surclassement'].",".$_POST['habilitation'].",true,true);";
           $qry->execute();
           return $qry;
           
       } 
    }

    public function update() {
        
    }

    public function delete() {
        
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


