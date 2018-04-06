<?php

namespace Model;

Class telephone {

    private $id_contact;
    private $telephone;
    private $type;
    private $remarque;
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

    function getTelephone() {
        return $this->telephone;
    }

    function getType() {
        return $this->type;
    }

    function getRemarque() {
        return $this->remarque;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function setId_contact($id_contact) {
        $this->id_contact = $id_contact;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setRemarque($remarque) {
        $this->remarque = $remarque;
    }

    function setOrdre($ordre) {
        $this->ordre = $ordre;
    }


}
