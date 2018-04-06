<?php

require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\adherentControlleur;

Autoloader::register();
$db = AccesBDD::connectBDD();
$adherentCtrl = new adherentControlleur($db);
$adherentCtrl->connexion();
$adherentCtrl->deconnexion();

?>



<br />

<?php
if (isset($_SESSION['identifiant'])) {
    echo '<h1>Vous êtes connecté !</h1>';
    ?>
    <form action="espaceadherent.php" method="POST">
        <input type="hidden" value="deconnexion" name="deconnexion">
        <button type="submit"class="btn btn-danger">Deconnexion</button>
    </form>

    <?php
} else {
    require("Form/connexionForm.php");
}
?>


<?php require "piedPage.php"; ?>