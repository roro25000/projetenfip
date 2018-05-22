<?php
require "entete.php";
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

$ea = $t->update($_GET['id']);
$dl = $t->delete($_GET['id']);
?>

<section class="page-section cta" style="background:#B22222">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="cta-inner text-center rounded">
                    <br />

                    <br />
                    <h2><?php
                        $nomEquipe = $eq->fetch(PDO::FETCH_ASSOC);
                        $eq = new \Model\Equipe($nomEquipe);
                        echo $eq->getNom();
                        ?></h2>
                    <table class="datatable table  table-bordered table-hover">
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
                            while ($donnees = $te->fetch(PDO::FETCH_ASSOC)) {
                                $adhe = new \Model\Adherent($donnees);
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $adhe->getId_adherent(); ?></th>
                                    <td><?php echo strtoupper($adhe->getNom()); ?></td>
                                    <td><?php echo $adhe->getPrenom(); ?></td>
                                    <td><?php echo $adhe->getNo_licence(); ?></td>

                                    <td><form method="POST" action="<?php echo 'listingJoueur.php?id=' . $_GET['id']; ?>">
                                            <input type="text" class="form-control" id="suppr" name="suppr" value="<?php echo $adhe->getId_adherent(); ?>" hidden>
                                            <button type="submit" class="btn btn-danger" >
                                                Supprimer de l'equipe
                                            </button>
                                        </form></td>

                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>
            <br>

        </div>
    </div>
</div>
</section>

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
                            <th scope="col">Prénom</th>
                            <th scope="col">N° de licence</th>
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
                                <td > <button id="ajoutJoueur<?php echo $adhe->getId_adherent(); ?>" class="btn btn-primary" role="button" onclick="ajoutJoueur(<?php echo $adhe->getId_adherent(); ?>)" style="display: block;">
                                        Ajouter
                                    </button>
                                    <button class="btn btn-info2" onclick="annulJoueur(<?php echo $adhe->getId_adherent(); ?>)" role="button" id="annulJoueur<?php echo $adhe->getId_adherent(); ?>" style="display: none;" >
                                        Annuler
                                    </button></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <form method="POST" action="<?php echo 'listingJoueur.php?id=' . $_GET['id']; ?>">
                    <input type="text" onchange="identifiantAuto()"  class="form-control" id="tabJoueur" name="tabJoueur" hidden>
                    <button type="submit" class="btn btn-primary" >
                        Valider
                    </button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<script>
    //    function testJoueur($id) {
    //        var tod = document.createElement("td")
    //        conso.le.log(tod)
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
        var liste = tabJoueur.toString()
        sessionStorage.setItem("tabJoueur", tabJoueur)
        document.querySelector('#tabJoueur').value = liste
        document.getElementById("ajoutJoueur" + $id).style.display = 'none';
        document.getElementById("annulJoueur" + $id).style.display = 'block';
    }

    function annulJoueur($id) {
        for (var i = 0; i < tabJoueur.length; i++) {
            if (tabJoueur[i] === $id) {
                delete tabJoueur[i]
                var liste = tabJoueur.toString()
                document.querySelector('#tabJoueur').value = liste
                document.getElementById("ajoutJoueur" + $id).style.display = 'block';
                document.getElementById("annulJoueur" + $id).style.display = 'none';
            }
        }
    }

    function valider() {
        console.log(sessionStorage.getItem("tabJoueur"))
    }

</script>


<?php require "piedPage.php"; ?>