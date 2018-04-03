<?php

namespace Model;

Class Championnats {

    private $id_championnats;
    private $nom_championnat;


    
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
    function getId_championnats() {
        return $this->id_championnats;
    }

    function getNom_championnat() {
        return $this->nom_championnat;
    }

    function setId_championnats($id_championnats) {
        $this->id_championnats = $id_championnats;
    }

    function setNom_championnat($nom_championnat) {
        $this->nom_championnat = $nom_championnat;
    }

        
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
