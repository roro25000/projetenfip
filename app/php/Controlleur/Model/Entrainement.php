<?php

namespace Model;

Class Entrainement {

    private $id_entrainement;
    private $id_equipe;
    private $id_entraineur;
    private $id_creneau;




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
    function getId_entrainement() {
        return $this->id_entrainement;
    }

    function getId_equipe() {
        return $this->id_equipe;
    }

    function getId_entraineur() {
        return $this->id_entraineur;
    }

    function getId_creneau() {
        return $this->id_creneau;
    }

    function setId_entrainement($id_entrainement) {
        $this->id_entrainement = $id_entrainement;
    }

    function setId_equipe($id_equipe) {
        $this->id_equipe = $id_equipe;
    }

    function setId_entraineur($id_entraineur) {
        $this->id_entraineur = $id_entraineur;
    }

    function setId_creneau($id_creneau) {
        $this->id_creneau = $id_creneau;
    }

    
        
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
