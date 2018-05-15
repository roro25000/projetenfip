<?php
require "entete.php";
require "piedPage.php";
require "menu.php";
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\equipeControlleur;

Autoloader::register();



$db = AccesBDD::connectBDD();
$t = new equipeControlleur($db);
//$te = $t->getJoueurs($_GET['id']);
$eq = $t->getNomUneEquipe($_GET['id']);
$te = $t->getJoueurs($_GET['id']);
$aj = $t->getAutresJoueurs($_GET['id']);
?>

<div class ="col-sm-9">
    <br />
    <h2><?php
        $nomEquipe = $eq->fetch(PDO::FETCH_ASSOC);
        $eq = new \Model\Equipe($nomEquipe);
        echo $eq->getNom();
        ?></h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Numero de licence</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($donnees = $te->fetch(PDO::FETCH_ASSOC)) {
                $adhe = new \Model\Adherent($donnees);
                ?>
                <tr>
                    <th scope="row"><?php echo $adhe->getId_adherent(); ?></th>
                    <td><?php echo strtoupper($adhe->getNom()); ?></td>
                    <td><?php echo $adhe->getPrenom(); ?></td>
                    <td><?php echo $adhe->getNo_licence(); ?></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>

    <a class="btn btn-info btn-lg btn-block" href="ajoutAdherent.php" role="button" data-toggle="modal" data-target="#exampleModal">Ajouter un/des joueur(s) à cette équipe</a>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Joueurs du clubs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Numero de licence</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($donnees = $aj->fetch(PDO::FETCH_ASSOC)) {
                            $adhe = new \Model\Adherent($donnees);
                            ?>
                            <tr id="<?php echo $adhe->getId_adherent(); ?>"  >
                                <td scope="row"><?php echo $adhe->getId_adherent(); ?></td>
                                <td><?php echo strtoupper($adhe->getNom()); ?></td>
                                <td><?php echo $adhe->getPrenom(); ?></td>
                                <td><?php echo $adhe->getNo_licence(); ?></td>
                                <td > <button id="ajoutJoueur<?php echo $adhe->getId_adherent(); ?>" class="btn btn-primary" role="button" onclick="ajoutJoueur(<?php echo $adhe->getId_adherent(); ?>)" style="visibility: visible;">
                                        Ajouter
                                    </button>
                                    <button class="btn btn-info" onclick="annulJoueur(<?php echo $adhe->getId_adherent(); ?>)" role="button" id="annulJoueur<?php echo $adhe->getId_adherent(); ?>" style="visibility: hidden;" >
                                        Annuler
                                    </button></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="valider()">Fermer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<script>
//    function testJoueur($id) {
//        var tod = document.createElement("td")
//        console.log(tod)
//        var boutton = document.createElement("button")
//        boutton.className = "btn btn-info"
//        boutton.setAttribute("role", "button")
//        boutton.onclick() = function(){
//            ajoutJoueur($id)
//        }
//        tod.appendChild(boutton)
//        console.log(tod)
//        document.getElementById($id).appendChild(tod)
//    }
    var tabJoueur = []
    function ajoutJoueur($id) {
        tabJoueur.push($id)
        sessionStorage.setItem("tabJoueur", tabJoueur)
        document.getElementById("ajoutJoueur" + $id).style.visibility = 'hidden';
        document.getElementById("annulJoueur" + $id).style.visibility = 'visible';
    }

    function annulJoueur($id) {
        for (var i = 0; i < tabJoueur.length; i++) {
            if (tabJoueur[i] === $id) {
                delete tabJoueur[i]
                document.getElementById("ajoutJoueur" + $id).style.visibility = 'visible';
                document.getElementById("annulJoueur" + $id).style.visibility = 'hidden';
            }
        }
    }

    function valider() {
        console.log(sessionStorage.getItem("tabJoueur"))
    }
</script>