<?php

namespace Model;

Class Equipe {

    private $id_equipe;
    private $id_categorie;
    private $nom;
    private $points;
    private $victoires;
    private $defaites;
    private $nulls;
    private $photo;
    private $club;



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
    function getId_equipe() {
        return $this->id_equipe;
    }

    function getId_categorie() {
        return $this->id_categorie;
    }

    function getNom() {
        return $this->nom;
    }

    function getPoints() {
        return $this->points;
    }

    function getVictoires() {
        return $this->victoires;
    }

    function getDefaites() {
        return $this->defaites;
    }

    function getNulls() {
        return $this->nulls;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getClub() {
        return $this->club;
    }

    function setId_equipe($id_equipe) {
        $this->id_equipe = $id_equipe;
    }

    function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPoints($points) {
        $this->points = $points;
    }

    function setVictoires($victoires) {
        $this->victoires = $victoires;
    }

    function setDefaites($defaites) {
        $this->defaites = $defaites;
    }

    function setNulls($nulls) {
        $this->nulls = $nulls;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setClub($club) {
        $this->club = $club;
    }

    
        
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
