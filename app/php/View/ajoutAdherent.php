<?php
require "entete.php";
require "piedPage.php";
require "menu.php";
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\AdherentControlleur;
use Controlleur\categorieControlleur;
use Controlleur\PosteControlleur;

Autoloader::register();



$db = AccesBDD::connectBDD();
$t = new AdherentControlleur($db);
$u = new categorieControlleur($db);
$p = new PosteControlleur($db);
$te = $t->getAll();
$t->add();  
$categ = $u->getAll();
$pst = $p->getAll();
?>

<div class="col-sm-7 offset-sm-1 ">
    <br />
    <div class="card">
        <div class="card-header text-center">
            <h3>Ajout adherent</h3>
        </div>

        <p class="card-text">
        <form method="POST" action="ajoutAdherent.php">
            <div class="card-body">
                <div class="form-group row justify-content-between" >
                    <div class="col-sm-3"><label for="nom">Nom</label></div>
                    <div class="col-sm-7 ">
                        <input type="text" onchange="identifiantAuto()"  class="form-control" id="nom" name="nom" placeholder="Entrer un nom">
                    </div> 
                </div>
                <div class="form-group row justify-content-between" >
                    <div class="col-sm-3"><label for="prenom">Prenom</label></div>
                    <div class="col-sm-7 ">
                        <input type="text" onchange="identifiantAuto()"  class="form-control" id="prenom" name="prenom" placeholder="Entrer un prenom">
                    </div> 
                </div>
                <div class="form-group row justify-content-between" >
                    <div class="col-sm-3"><label for="email">email</label></div>
                    <div class="col-sm-7 ">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrer un email">
                    </div> 
                </div>

                <div class="form-group row justify-content-between" >
                    <div class="col-sm-3"><label for="identifiant">Identifiant</label></div>
                    <div class="col-sm-7 ">
                        <input type="text" class="form-control" id="identifiant" name="identifiant" aria-describedby="identifiantAide" placeholder="nom.prenom">
                    </div> 
                </div>

                <div class="form-group row justify-content-between">
                    <div class="col-sm-3">
                        <label for="motdepasse">Mot de passe</label>
                    </div>
                    <div class="col-sm-7 ">
                        <input type="password" onchange="checkMDP()" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrer votre mot de passe">
                    </div> 
                </div>
                <div class="form-group row justify-content-between">
                    <div class="col-sm-3">
                        <label for="Confmotdepasse">Confirmation du mot de passe</label>
                    </div>
                    <div class="col-sm-7 ">
                        <input type="password" onchange="checkMDP()" class="form-control" id="confmotdepasse" name="confmotdepasse" placeholder="Confirmer votre mot de passe">
                    </div> 
                </div>
                <div class="form-group row justify-content-between">
                    <div class="col-sm-3">
                        <label for="categorie">Categorie</label>
                    </div>
                    <div class="col-sm-7 ">
                        <div class="dropdown">
                            <button class="btn btn-success btn-block dropdown-toggle" type="button" id="DDcategorie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorie
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <?php
                                while ($donnees = $categ->fetch(PDO::FETCH_ASSOC)) {
                                    $categorie = new \Model\Categorie($donnees);
                                    $id = $categorie->getId_categorie();
                                    $des = $categorie->getDescription();
                                    $categNom = $categorie->getCategorie();
                                    ?>
                                    <button class="dropdown-item"  onclick="<?php echo "changementDropdown(" . $id . ",'" . $des . "','" . $categNom . "')"; ?>" 
                                            type="button"><?php echo $categNom . '(' . $des . ')'; ?></button>
                                        <?php }; ?>

                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="categorie" name="categorie" placeholder="categorie">
                    </div> 
                </div>
                <div class="form-group row justify-content-between">
                    <div class="col-sm-3">
                        <label for="poste">Poste</label>
                    </div>
                    <div class="col-sm-7 ">
                        <div class="dropdown">
                            <button class="btn btn-danger btn-block dropdown-toggle" type="button" id="DDposte" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                poste
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <?php
                                while ($donnees = $pst->fetch(PDO::FETCH_ASSOC)) {
                                    $poste = new \Model\Poste($donnees);
                                    $idP = $poste->getId_poste();
                                    $desP = $poste->getDescription();
                                    ?>
                                    <button class="dropdown-item"  onclick="<?php echo "changementDropdownPoste(" . $idP . ",'" . $desP . "')"; ?>" 
                                            type="button"><?php echo $desP; ?></button>
                                        <?php }; ?>

                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="poste" name="poste" placeholder="poste">
                    </div> 
                </div>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="surclassement">Surclassement</label>
                    </div>
                    <div class="col-sm-5 ">
                        <input type="checkbox" class="form-control" id="surclassement">
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <div class="col-sm-3">
                        <label for="poste">Habilitation</label>
                    </div>
                    <div class="col-sm-7 ">
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle btn-block" type="button" id="DDhabilitation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Habilitation
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                $entr = "entrainneur";
                                $entrId = 2;
                                $adm = "administrateur";
                                $admId = 1;
                                $joueur = "joueur";
                                $jId = 3;
                                ?>
                                <button class="dropdown-item" onclick="changementDropdownHab(<?php echo "'" . $entrId . "','" . $entr . "'"; ?>)"type="button"><?php echo $entr; ?></button>
                                <button class="dropdown-item" onclick="changementDropdownHab(<?php echo "'" . $admId . "','" . $adm . "'"; ?>)"type="button"><?php echo $adm; ?></button>
                                <button class="dropdown-item" onclick="changementDropdownHab(<?php echo "'" . $jId . "','" . $joueur . "'"; ?>)"type="button"><?php echo $joueur; ?></button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="habilitation" name="habilitation" placeholder="habilitation">
                    </div> 
                </div>
                <div class="form-group row justify-content-between" >
                    <div class="col-sm-3"><label for="dateNaissance">Date de naissance</label></div>
                    <div class="col-sm-7 ">
                        <input type=date id="dateNaissance" onchange="testDateNaissance(document.querySelector('#datepicker').value)" name="datepicker" />
                    </div> 
                </div>
                <div class="form-group row justify-content-between">
                    <div class="col-sm-3">
                        <label for="genre">Genre</label>
                    </div>
                    <div class="col-sm-7">
                        <select class="form-control" id="Genre">
                            <option>M</option>
                            <option>F</option>
                        </select> 
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary btn-block" id="creationAdherent">Creer</button>
            </div>

        </form>

    </div>
</div>

</div>

<script>
    

    function testDateNaissance(date) {
        document.querySelector('#creationAdherent').setAttribute("disabled", "")
        var regex = /^(3[0-1]|[0-2][0-9])\/(1[0-2]|0[0-9])\/[0-9]{4}$/;
        var test = regex.test(date);
        if (test) {
            document.querySelector('#creationAdherent').removeAttribute("disabled");
        }
    }

    function identifiantAuto() {
        if (document.querySelector('#prenom').value === "") {
            $prenom = "prenom";
        } else {
            $prenom = document.querySelector('#prenom').value;
        }
        if (document.querySelector('#nom').value === "") {
            $nom = "nom";
        } else {
            $nom = document.querySelector('#nom').value;
        }
        document.querySelector('#identifiant').value = $nom.toLowerCase() + '.' + $prenom.toLowerCase()
    }

    function changementDropdown($id, $des, $categ) {
        document.querySelector('#DDcategorie').innerHTML = $categ + '(' + $des + ')'
        document.querySelector('#categorie').value = $id
    }

    function changementDropdownPoste($id, $des) {
        document.querySelector('#DDposte').innerHTML = $des
        document.querySelector('#poste').value = $id
    }

    function changementDropdownHab($id, $des) {
        document.querySelector('#DDhabilitation').innerHTML = $des
        document.querySelector('#habilitation').value = $id
    }

    function checkMDP() {
        document.querySelector('#creationAdherent').setAttribute("disabled", "")
        pw1 = document.querySelector('#motdepasse').value;
        pw2 = document.querySelector('#Confmotdepasse').value;
        if ((pw1 === pw2) && (pw1 !== "") && (pw2 !== "")) {
            document.querySelector('#creationAdherent').removeAttribute("disabled");
        } else {
            if ((pw1 !== "") && (pw2 !== "")) {
                alert("\erreur: les mots de passes ne correspondent pas");
            }
        }
    }
</script>
