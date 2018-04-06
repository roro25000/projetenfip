<?php
require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\equipeControlleur;
use Controlleur\CatalogueControlleur;

Autoloader::register();



$db = AccesBDD::connectBDD();
$t = new CatalogueControlleur($db);
$te = $t->getAll();
?>
<div class="row">
    <?php
    while ($donnees = $te->fetch(PDO::FETCH_ASSOC)) {
        $categ = new \Model\Catalogue($donnees);
        ?>
        <br />
        <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
                <!--<img class="card-img-top" src="<?php // echo $categ->getLien_photo();  ?>" alt="Card image cap">-->
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $categ->getDesignation(); ?></h5>
                    <p class="card-text text-center">
                    
                    Taille : <?php echo $categ->getTaille(); ?>
                    <br />
                    Coloris : <?php echo $categ->getColoris(); ?>
                    <br />
                    Prix : <?php echo $categ->getPrix(); ?>€
                    <br />
                    <a href="#" class="btn btn-primary">Acheter</a>
                    </p>
                </div>
            </div>
            <br />
        </div>

    <?php }; ?>
</div>
<?php require "piedPage.php"; ?>


