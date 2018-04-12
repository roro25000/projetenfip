<?php

namespace Model;

Class Match {

    private $id_match;
    private $id_equipe_a;
    private $nom_equipe_a;
    private $id_creneau;
    private $score_a;
    private $score_b;
    private $duree;
    private $nom_equipe_b;
    private $id_championnat;
    
    // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).

    public function hydrate(array $donnees) {

        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }
    
    function getNom_equipe_a() {
        return $this->nom_equipe_a;
    }

    function setNom_equipe_a($nom_equipe_a) {
        $this->nom_equipe_a = $nom_equipe_a;
    }

        function getId_match() {
        return $this->id_match;
    }

    function getId_equipe_a() {
        return $this->id_equipe_a;
    }

    function getId_creneau() {
        return $this->id_creneau;
    }

    function getScore_a() {
        return $this->score_a;
    }

    function getScore_b() {
        return $this->score_b;
    }

    function getDuree() {
        return $this->duree;
    }

    function getNom_equipe_b() {
        return $this->nom_equipe_b;
    }

    function getId_championnat() {
        return $this->id_championnat;
    }

    function setId_match($id_match) {
        $this->id_match = $id_match;
    }

    function setId_equipe_a($id_equipe_a) {
        $this->id_equipe_a = $id_equipe_a;
    }

    function setId_creneau($id_creneau) {
        $this->id_creneau = $id_creneau;
    }

    function setScore_a($score_a) {
        $this->score_a = $score_a;
    }

    function setScore_b($score_b) {
        $this->score_b = $score_b;
    }

    function setDuree($duree) {
        $this->duree = $duree;
    }

    function setNom_equipe_b($nom_equipe_b) {
        $this->nom_equipe_b = $nom_equipe_b;
    }

    function setId_championnat($id_championnat) {
        $this->id_championnat = $id_championnat;
    }

    

    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
