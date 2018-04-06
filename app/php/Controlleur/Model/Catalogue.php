<?php

namespace Model;

Class Catalogue {

    private $id_article;
    private $designation;
    private $des_comp;
    private $taille;
    private $coloris;
    private $prix;
    private $lien_photo;




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
    function getId_article() {
        return $this->id_article;
    }

    function getDesignation() {
        return $this->designation;
    }

    function getDes_comp() {
        return $this->des_comp;
    }

    function getTaille() {
        return $this->taille;
    }

    function getColoris() {
        return $this->coloris;
    }

    function getPrix() {
        return $this->prix;
    }

    function getLien_photo() {
        return $this->lien_photo;
    }

    function setId_article($id_article) {
        $this->id_article = $id_article;
    }

    function setDesignation($designation) {
        $this->designation = $designation;
    }

    function setDes_comp($des_comp) {
        $this->des_comp = $des_comp;
    }

    function setTaille($taille) {
        $this->taille = $taille;
    }

    function setColoris($coloris) {
        $this->coloris = $coloris;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setLien_photo($lien_photo) {
        $this->lien_photo = $lien_photo;
    }

        function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
