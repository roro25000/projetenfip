<?php

namespace Controlleur;

use PDO;

//use Model\categorie as Categorie;
class equipeControlleur {

    private $db;

    function __construct($db) {
        $this->setDb($db);
    }

    function getAll() {
        $qry = $this->db->prepare("SELECT * FROM equipes;");
        $qry->execute();
        return $qry;
    }

    function getEquipeNom() {
        $qry = $this->db->prepare("select nom, id_equipe from equipes order by id_equipe;");
        $qry->execute();
        return $qry;
    }

    function getNomUneEquipe($id) {
        $qry = $this->db->prepare("select nom from equipes WHERE id_equipe=" . $id . ";");
        $qry->execute();
        return $qry;
    }

    function getJoueurs($id) {
        $qry = $this->db->prepare("SELECT adherents.id_adherent,adherents.nom,adherents.prenom,adherents.no_licence
                                    FROM equipes,joue,adherents
                                    WHERE joue.id_adherent=adherents.id_adherent
                                    AND equipes.id_equipe='" . $id . "'
                                    AND joue.id_equipe='" . $id . "';");
        $qry->execute();
        return $qry;
    }

    public function getAutresJoueurs($id) {
        $qry = $this->db->prepare("select * from adherents where id_adherent in (select id_adherent from adherents except select id_adherent from joue where id_equipe = " . $id . ") ORDER BY nom;");
        $qry->execute();
        return $qry;
    }

    public function update($idEquipe) {
        if (isset($_POST['tabJoueur'])) {
            $string = $_POST['tabJoueur'];
            $str = preg_replace("/,{2,}/", ",", $string);
            $str = preg_replace("/(^,|,$)/", "", $str);
            echo "list--" . $str;
            foreach (explode(",", $str) as $elements) {
                $qry = $this->db->prepare('Select * FROM joue WHERE id_adherent=' . $elements . ' AND id_equipe='.$idEquipe.';');
                $qry->execute();
                $compteur = 0;
                while ($donnees = $qry->fetch(PDO::FETCH_ASSOC)) {
                    $compteur++;
                    $joue = new \Model\Joue($donnees);
                }
                if ($compteur == 0) {
                    $req2 = $this->db->prepare('insert into joue (id_adherent,id_equipe) values ('.$elements.','.$idEquipe.');');
                    $req2->execute();
                }
            }
            header('Location: mapage.php?mavar='.$idEquipe);
        }
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


