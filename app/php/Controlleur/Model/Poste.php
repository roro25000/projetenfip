<?php

namespace Model;

Class Poste {

    private $id_poste;
    private $designation;
    private $description;





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
    function getId_poste() {
        return $this->id_poste;
    }

    function getDesignation() {
        return $this->designation;
    }

    function getDescription() {
        return $this->description;
    }

    function setId_poste($id_poste) {
        $this->id_poste = $id_poste;
    }

    function setDesignation($designation) {
        $this->designation = $designation;
    }

    function setDescription($description) {
        $this->description = $description;
    }

        function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
