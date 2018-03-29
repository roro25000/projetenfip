<?php
    namespace App;
    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

    require("entete.html");
    require("../Autoloader.php");
    Autoloader::register(); 
    
    use accesBDD;
    $db = AccesBDD::connectBDD();
    
    require("../Controlleur/categorieControlleur.php");
    $t = new categorieControlleur($db);
    $t->getAll();
    
    
    
    require("piedPage.html");
?>


