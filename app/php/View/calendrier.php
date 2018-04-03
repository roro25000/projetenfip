<?php
require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\equipeControlleur;

Autoloader::register();



$db = AccesBDD::connectBDD();
$t = new equipeControlleur($db);
$te = $t->getAll();
while ($donnees = $te->fetch(PDO::FETCH_ASSOC)) {
   $categ = new \Model\Equipe($donnees);
   echo '<p>' . $categ->getNom() . '</p>';
};
?>

<button type="button" class="btn btn-primary">Ajout Equipe</button>
<link href='../../../public/fullcalendar-3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='../../../public/fullcalendar-3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../../../public/fullcalendar-3.9.0/lib/moment.min.js'></script>
<script src='../../../public/fullcalendar-3.9.0/lib/jquery.min.js'></script>
<script src='../../../public/fullcalendar-3.9.0/fullcalendar.min.js'></script>
<script src='../../../public/fullcalendar-3.9.0/locale-all.js'></script>




<?php require "piedPage.html"; ?>


