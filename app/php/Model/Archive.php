<?php

namespace Model;

Class Archive {

    private $id_archive;
    private $titre;
    private $type;
    private $lien_photo;
    private $contenu;
    private $lien_document;
    private $id_createur;
    private $date_creation;
    private $id_validateur;
    private $date_validation;




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
    function getId_archive() {
        return $this->id_archive;
    }

    function getTitre() {
        return $this->titre;
    }

    function getType() {
        return $this->type;
    }

    function getLien_photo() {
        return $this->lien_photo;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getLien_document() {
        return $this->lien_document;
    }

    function getId_createur() {
        return $this->id_createur;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function getId_validateur() {
        return $this->id_validateur;
    }

    function getDate_validation() {
        return $this->date_validation;
    }

    function setId_archive($id_archive) {
        $this->id_archive = $id_archive;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setLien_photo($lien_photo) {
        $this->lien_photo = $lien_photo;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setLien_document($lien_document) {
        $this->lien_document = $lien_document;
    }

    function setId_createur($id_createur) {
        $this->id_createur = $id_createur;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    function setId_validateur($id_validateur) {
        $this->id_validateur = $id_validateur;
    }

    function setDate_validation($date_validation) {
        $this->date_validation = $date_validation;
    }

        
        
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
