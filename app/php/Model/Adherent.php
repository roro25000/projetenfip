<?php

namespace Model;

Class Adherent {

    private $id_adherent;
    private $id_categorie;
    private $id_poste;
    private $login;
    private $mdp;
    private $nom;
    private $prenom;
    private $no_licence;
    private $date_naissance;
    private $genre;
    private $surclassement;
    private $habilitation;
    private $arbitre;
    private $entraineur;


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
    function getId_adherent() {
        return $this->id_adherent;
    }

    function getId_categorie() {
        return $this->id_categorie;
    }

    function getId_poste() {
        return $this->id_poste;
    }

    function getLogin() {
        return $this->login;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getNo_licence() {
        return $this->no_licence;
    }

    function getDate_naissance() {
        return $this->date_naissance;
    }

    function getGenre() {
        return $this->genre;
    }

    function getSurclassement() {
        return $this->surclassement;
    }

    function getHabilitation() {
        return $this->habilitation;
    }

    function getArbitre() {
        return $this->arbitre;
    }

    function getEntraineur() {
        return $this->entraineur;
    }

    function setId_adherent($id_adherent) {
        $this->id_adherent = $id_adherent;
    }

    function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }

    function setId_poste($id_poste) {
        $this->id_poste = $id_poste;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setNo_licence($no_licence) {
        $this->no_licence = $no_licence;
    }

    function setDate_naissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setSurclassement($surclassement) {
        $this->surclassement = $surclassement;
    }

    function setHabilitation($habilitation) {
        $this->habilitation = $habilitation;
    }

    function setArbitre($arbitre) {
        $this->arbitre = $arbitre;
    }

    function setEntraineur($entraineur) {
        $this->entraineur = $entraineur;
    }

    
    
        function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
