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
    echo '<h5>Vous êtes connecté en tant que : </5>'.$_SESSION['identifiant'];
    require("siteAdherent/menu.php");
} else {
    require("Form/connexionForm.php");
}
?>

<?php require "piedPage.php"; ?>