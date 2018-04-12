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
                    <td><?php echo $adhe->getNom(); ?></td>
                    <td><?php echo $adhe->getPrenom(); ?></td>
                    <td><?php echo $adhe->getNo_licence(); ?></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>
</div>
