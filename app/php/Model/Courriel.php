<?php

namespace Model;

Class Courriel {

    private $id_contact;
    private $courriel;
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
    function getId_contact() {
        return $this->id_contact;
    }

    function getCourriel() {
        return $this->courriel;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function setId_contact($id_contact) {
        $this->id_contact = $id_contact;
    }

    function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

        function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
