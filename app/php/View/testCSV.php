

<body>

<table border="2">
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
	$loc = $_POST['equipe_id'];//"../../../public/ressources/csv/ffvb_calendrier.csv";
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
		foreach ($tab2 as $str)
		{
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
		}
	}
	?>	
	</table>


</body>
</html> 