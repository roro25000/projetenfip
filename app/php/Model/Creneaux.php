<?php

namespace Model;

Class Creneaux {

    private $id_creneau;
    private $id_salle;
    private $debut;
    private $fin;

    
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
    function getId_creneau() {
        return $this->id_creneau;
    }

    function getId_salle() {
        return $this->id_salle;
    }

    function getDebut() {
        return $this->debut;
    }

    function getFin() {
        return $this->fin;
    }

    function setId_creneau($id_creneau) {
        $this->id_creneau = $id_creneau;
    }

    function setId_salle($id_salle) {
        $this->id_salle = $id_salle;
    }

    function setDebut($debut) {
        $this->debut = $debut;
    }

    function setFin($fin) {
        $this->fin = $fin;
    }

    
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
