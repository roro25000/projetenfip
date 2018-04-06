<?php

namespace Controlleur;

use PDO;

//use Model\categorie as Categorie;
class adherentControlleur {

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


