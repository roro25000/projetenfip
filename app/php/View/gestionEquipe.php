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
$te = $t->getAll();
?>
<div class ="col-sm-9">
    <br />
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Victoires</th>             
                <th scope="col">Egalites</th>
                <th scope="col">Defaites</th>
                <th scope="col">Points</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($donnees = $te->fetch(PDO::FETCH_ASSOC)) {
                $equipe = new \Model\Equipe($donnees);
                ?>
                <tr>
                    <th scope="row"><?php echo $equipe->getId_equipe(); ?></th>
                    <td><?php echo $equipe->getNom(); ?></td>
                    <td><?php echo $equipe->getVictoires(); ?></td>
                    <td><?php echo $equipe->getNulls(); ?></td>
                    <td><?php echo $equipe->getDefaites(); ?></td>
                    <td><?php echo $equipe->getPoints(); ?></td>
                    <td><a class="btn btn-primary" href="<?php echo 'listingJoueur.php?id='.$equipe->getId_equipe() ;?>" role="button">
                            Joueurs
                        </a></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>
</div>

<br>
<?php require "piedPage.php";?>