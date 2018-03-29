<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>yo</title>
    </head>
    <body>
        <?php
//        phpinfo();
        require "entete.html";
        require "piedPage.html";


        try{
        $db = new PDO("pgsql:host=10.189.251.9;dbname=scp6", "scp6", "scp6");
        }
        catch(Exception $e){
            die("erreur : ".$e->getMessage());
        }
        $qry = $db->prepare("SELECT * FROM categories;");
        $qry->execute();
        //$noms = $qry->fetch();
        //print_r($nom);
        echo '<p id="catégorie">';
        while($nom = $qry->fetch()){
            echo $nom['description'].'<br/>';
            //echo "nom : ".$_GET['categorie'];
        }
        echo '</p>';
        ?>
        
    </body>
</html>



