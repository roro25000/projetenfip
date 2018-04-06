<?php

namespace Model;

Class Categorie {

    private $id_categorie;
    private $categorie;
    private $description;
    private $annee_deb;
    private $annee_fin;
    private $tarif;
    
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

    function getId_categorie() {
        return $this->id_categorie;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getDescription() {
        return $this->description;
    }

    function getAnnee_deb() {
        return $this->annee_deb;
    }

    function getAnnee_fin() {
        return $this->annee_fin;
    }

    function getTarif() {
        return $this->tarif;
    }

    function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setAnnee_deb($annee_deb) {
        $this->annee_deb = $annee_deb;
    }

    function setAnnee_fin($annee_fin) {
        $this->annee_fin = $annee_fin;
    }

    function setTarif($tarif) {
        $this->tarif = $tarif;
    }

    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
