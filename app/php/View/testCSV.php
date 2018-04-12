<?php
require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\equipeControlleur;

use Controlleur\calendrierControlleur;
Autoloader::register();





?>



<body>

<table border="2">
    
    <?php echo "public/ressources/csv/".$_POST['URLCSV']; ?>
		<tr>
			<th>ENTITE</th>
			<th>JOURNEE</th>
			<th>MATCH</th>
                        <th>DATE</th>
                        <th>HEURE</th>
                        <th>EQUIPE NO DOM</th>
                        <th>EQUIPE NOM DOM</th>
                        <th>EQUIPE NO EXT</th>
                        <th>EQUIPE NOM EXT</th>
                        <th>SET</th>
                        <th>SCORE</th>
                        <th>TOTAL</th>
                        <th>SALLE</th>
                        <th>ARBITRE 1</th>
                        <th>ARBITRE 2</th>
                        
		</tr>
	
	<?php
	$loc = "../../../public/ressources/csv/ffvb_calendrier.csv";
        

$tabFich = file($loc);

$nbLignes = count($tabFich);

echo 'le fichier fait '.$nbLignes.' ligne(s).';

	$fd = fopen("$loc","r"); 
	$tab = array();
	//$tab = list($user, $pass, $uid, $gid, $gecos, $home, $shell)
	$tab2 = array();
	if($fd == NULL)
	{
		echo "Erreur d'ouverture de : $fichier<br>";
		exit(-1);
	}
	else
	{
		while (($buffer = fgets($fd)) != false) {
			$tab2[] = $buffer;
		}
		
		asort($tab2);
	//	foreach ($tab2 as $str)
        for($i=1;$i<$nbLignes;$i++)
		{
                   $db = AccesBDD::connectBDD();
                   $str=$tab2[$i];         
                    $tab = explode(';',$str);
			echo "<tr>";
			echo "<td>$tab[0]</td>";
			echo "<td>$tab[1]</td>";
			echo "<td>$tab[2]</td>";
                        echo "<td>$tab[3]</td>";
                        echo "<td>$tab[4]</td>";
                        echo "<td>$tab[5]</td>";
			echo "<td>$tab[6]</td>";
			echo "<td>$tab[7]</td>";
                        echo "<td>$tab[8]</td>";
                        echo "<td>$tab[9]</td>";
			echo "<td>$tab[10]</td>";
			echo "<td>$tab[11]</td>";
                        echo "<td>$tab[12]</td>";
			echo "<td>$tab[13]</td>";
			echo "<td>$tab[14]</td>";
			echo "</tr>";
                   	$t = new calendrierControlleur($db);    
                   $te = $t->InsertionCreneau($tab[3]." ".$tab[4],$tab[3] ." 18:00",$tab[12]); 
                    

		}
         
	}
            ?>
             
                
	</table>
</body>

</html> 