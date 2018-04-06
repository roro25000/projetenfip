<?php

namespace Model;

Class Entraine {

    private $id_entraineur;
    private $id_equipe;
    private $ordre;




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
    function getId_entraineur() {
        return $this->id_entraineur;
    }

    function getId_equipe() {
        return $this->id_equipe;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function setId_entraineur($id_entraineur) {
        $this->id_entraineur = $id_entraineur;
    }

    function setId_equipe($id_equipe) {
        $this->id_equipe = $id_equipe;
    }

    function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

    
        function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
