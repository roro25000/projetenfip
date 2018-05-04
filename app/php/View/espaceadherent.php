<?php

require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\AdherentControlleur;

Autoloader::register();
$db = AccesBDD::connectBDD();
$adherentCtrl = new AdherentControlleur($db);
$adherentCtrl->connexion();
$adherentCtrl->deconnexion();

?>



<br />

<?php
if (isset($_SESSION['identifiant'])) {
    require("menu.php");
} else {
    require("Form/connexionForm.php");
}
?>

