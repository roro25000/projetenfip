<?php

namespace Model;

Class Sponsor {

    private $id_sponsor;
    private $nom_sponsor;
    private $adresse;
    private $lien_sponsor;
    private $lien_logo;




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
    function getId_sponsor() {
        return $this->id_sponsor;
    }

    function getNom_sponsor() {
        return $this->nom_sponsor;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getLien_sponsor() {
        return $this->lien_sponsor;
    }

    function getLien_logo() {
        return $this->lien_logo;
    }

    function setId_sponsor($id_sponsor) {
        $this->id_sponsor = $id_sponsor;
    }

    function setNom_sponsor($nom_sponsor) {
        $this->nom_sponsor = $nom_sponsor;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setLien_sponsor($lien_sponsor) {
        $this->lien_sponsor = $lien_sponsor;
    }

    function setLien_logo($lien_logo) {
        $this->lien_logo = $lien_logo;
    }

    
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}

