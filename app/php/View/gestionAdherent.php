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
?>

<section class="page-section cta" style="background:#B22222">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="cta-inner text-center rounded">
                    <br />
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
                                    <td><?php echo $adhe->getNom(); ?></td>
                                    <td><?php echo $adhe->getPrenom(); ?></td>
                                    <td><?php echo $adhe->getNo_licence(); ?></td>
                                </tr>
                            <?php }; ?>
                                
                        </tbody>
                    </table>

                </div>
            </div>
            <br>
<div class="col-xl-4 mx-auto">

        <a class="btn btn-danger btn-lg btn-block" href="ajoutAdherent.php" role="button">Ajout d'un joueur</a>

</div>
        </div>
    </div>
</div>
</section>


<?php require "piedPage.php"; ?>