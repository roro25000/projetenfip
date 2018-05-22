<?php
require "entete.php";
require "menu.php";
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\AdherentControlleur;

Autoloader::register();



$db = AccesBDD::connectBDD();
$t = new AdherentControlleur($db);
$te = $t->getAll();
$dl = $t->delete();
?>

<section class="page-section cta" style="background:#B22222">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="cta-inner text-center rounded">
                    <br />
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
                                    <td><?php echo $adhe->getNom(); ?></td>
                                    <td><?php echo $adhe->getPrenom(); ?></td>
                                    <td><?php echo $adhe->getNo_licence(); ?></td>
                                    <td><form method="POST" action="gestionAdherent.php">
                                            <input type="text" class="form-control" id="suppr" name="suppr" value="<?php echo $adhe->getId_adherent(); ?>" hidden>
                                            <button type="submit" onclick="confirm('Attention cette action supprimera toutes les donnees du joueurs')"class="btn btn-danger" >
                                                Supprimer
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
            <div class="col-xl-3 mx-auto">

                <a class="btn btn-danger btn-lg btn-block" href="ajoutAdherent.php" role="button">Ajout d'un joueur</a>

            </div>
        </div>
    </div>
</div>
</section>

<?php require "piedPage.php"; ?>