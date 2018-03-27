<?php
$db = new PDO("pgsql:host=10.189.251.9;dbname=scp6", "scp6", "scp6");
echo "Connexion OK<br/>";
$qry = $db->prepare("SELECT * FROM adherents;");
$qry->execute();
$noms = $qry->fetch();
print_r($noms);
?>