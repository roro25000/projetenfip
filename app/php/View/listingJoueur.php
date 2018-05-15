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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($donnees = $aj->fetch(PDO::FETCH_ASSOC)) {
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>