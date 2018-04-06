<?php

namespace Model;

Class Joue {

    private $id_adherent;
    private $id_equipe;




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

    function getId_equipe() {
        return $this->id_equipe;
    }

    function setId_adherent($id_adherent) {
        $this->id_adherent = $id_adherent;
    }

    function setId_equipe($id_equipe) {
        $this->id_equipe = $id_equipe;
    }

    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}


