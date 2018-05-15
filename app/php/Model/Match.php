<?php

namespace Model;

Class Match {

    private $id_match;
    private $id_equipe_a;
    private $nom_equipe_a;
    private $id_creneau;
    private $score;
    private $set;
    private $total;
    private $nom_equipe_b;
    
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
    
    function getId_match() {
        return $this->id_match;
    }

    function getId_equipe_a() {
        return $this->id_equipe_a;
    }

    function getNom_equipe_a() {
        return $this->nom_equipe_a;
    }

    function getId_creneau() {
        return $this->id_creneau;
    }

    function getScore() {
        return $this->score;
    }

    function getSet() {
        return $this->set;
    }

    function getTotal() {
        return $this->total;
    }

    function getNom_equipe_b() {
        return $this->nom_equipe_b;
    }

    function setId_match($id_match) {
        $this->id_match = $id_match;
    }

    function setId_equipe_a($id_equipe_a) {
        $this->id_equipe_a = $id_equipe_a;
    }

    function setNom_equipe_a($nom_equipe_a) {
        $this->nom_equipe_a = $nom_equipe_a;
    }

    function setId_creneau($id_creneau) {
        $this->id_creneau = $id_creneau;
    }

    function setScore($score) {
        $this->score = $score;
    }

    function setSet($set) {
        $this->set = $set;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setNom_equipe_b($nom_equipe_b) {
        $this->nom_equipe_b = $nom_equipe_b;
    }

    
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
