<?php
require "entete.php";

require "menu.php";
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\MatchControlleur;

Autoloader::register();



$db = AccesBDD::connectBDD();
$t = new MatchControlleur($db);
$te = $t->getAll();
?>
<section class="page-section cta" style="background:#B22222">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="cta-inner text-center rounded">
                    <br />
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom equipe A</th>
                                <th scope="col">Nom equipe B</th>    
                                <th scope="col">Score</th>
                                <th scope="col">Set</th>         
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($donnees = $te->fetch(PDO::FETCH_ASSOC)) {
                                $match = new \Model\Match($donnees);
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $match->getId_match(); ?></th>
                                    <td><?php echo $match->getNom_equipe_a(); ?></td>
                                    <td><?php echo $match->getNom_equipe_b(); ?></td>
                                    <td><?php echo $match->getScore(); ?></td>
                                    <td><?php echo $match->getSet(); ?></td>
                                    <td><?php echo $match->getTotal(); ?></td>
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

<?php
require "piedPage.php";
?>

