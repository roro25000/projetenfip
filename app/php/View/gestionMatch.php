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
<div class ="col-sm-9">
    <br />
    <table class="table">
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
<?php
require "piedPage.php";
?>

