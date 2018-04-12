<?php
require "entete.php";
require "piedPage.php";
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
                <th scope="col">Score</th>
                <th scope="col">Nom equipe B</th>             
                <th scope="col">Score</th>
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
                    <?php
                    if (!$match->getScore_a() & !$match->getScore_b()) {
                        echo '<td style="background-color:#cccccc;"> 0 </td>';
                    } else {
                        if ($match->getScore_a() > $match->getScore_b()) {
                            echo '<td style="background-color:#6fdc6f;">' . $match->getScore_a() . '</td>';
                        } else {
                            echo '<td style="background-color:#ff4d4d;">' . $match->getScore_a() . '</td>';
                        }
                    }
                    ?>
                    <td><?php echo $match->getNom_equipe_b(); ?></td>  
                    <?php
                    if (!$match->getScore_b() & !$match->getScore_a()) {
                        echo '<td style="background-color:#cccccc;"> 0 </td>';
                    } else {
                        if ($match->getScore_a() > $match->getScore_b()) {
                            echo '<td style="background-color:#ff4d4d;">' . $match->getScore_b() . '</td>';
                        } else {
                            echo '<td style="background-color:#6fdc6f;">' . $match->getScore_b() . '</td>';
                        }
                    }
                    ?>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>
</div>