<?php

namespace Model;

Class Salle {

    private $id_salle;
    private $nom;
    private $adresse;
    private $code_postal;
    private $ville;
    private $complement;



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
    function getId_salle() {
        return $this->id_salle;
    }

    function getNom() {
        return $this->nom;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getCode_postal() {
        return $this->code_postal;
    }

    function getVille() {
        return $this->ville;
    }

    function getComplement() {
        return $this->complement;
    }

    function setId_salle($id_salle) {
        $this->id_salle = $id_salle;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setCode_postal($code_postal) {
        $this->code_postal = $code_postal;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setComplement($complement) {
        $this->complement = $complement;
    }

        
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
