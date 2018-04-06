    <?php

namespace Model;

Class Contact {

    private $id_contact;
    private $id_adherent;
    private $nom;
    private $prenom;
    private $adresse;
    private $code_postal;
    private $ville;
    private $complement;
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

    function getId_adherent() {
        return $this->id_adherent;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
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

    function getRemarque() {
        return $this->remarque;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function setId_contact($id_contact) {
        $this->id_contact = $id_contact;
    }

    function setId_adherent($id_adherent) {
        $this->id_adherent = $id_adherent;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
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

    function setRemarque($remarque) {
        $this->remarque = $remarque;
    }

    function setOrdre($ordre) {
        $this->ordre = $ordre;
    }

            
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

}
