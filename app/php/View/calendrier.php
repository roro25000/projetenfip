<?php
require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;
use Controlleur\equipeControlleur;

use Controlleur\calendrierControlleur;
Autoloader::register();





?>

<link href='../../../public/fullcalendar-3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='../../../public/fullcalendar-3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../../../public/fullcalendar-3.9.0/lib/moment.min.js'></script>
<script src='../../../public/fullcalendar-3.9.0/lib/jquery.min.js'></script>
<script src='../../../public/fullcalendar-3.9.0/fullcalendar.min.js'></script>
<script src='../../../public/fullcalendar-3.9.0/locale-all.js'></script>



<script>
$(document).ready(function() {

    $('#calendar').fullCalendar({
     locale:'fr',
     
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate:  <?php  $today = date('m/j/y');
                            echo "'$today'";?>,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow more link when too many events
      events: [
      
      <?php  $db = AccesBDD::connectBDD();
    $t = new calendrierControlleur($db);
    $te = $t->getMatch();?>
    ]});
   })          
</script>
<br/>
  <div id='calendar'></div>

  
  <style>



  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>

<?php echo $t->getSalle("RIVI�RE") ?>
<?php echo $t->getSalle("MONASTI�") ?>
<?php echo $t->getSalle("LOLE") ?>

<form method="post" action="testCSV.php">
    
    <select id="equipe_id" name="equipe_id">
    <?php 
    $eq = new equipeControlleur($db);
    $eqga = $eq->getAll();
    while ($donnees = $eqga->fetch(PDO::FETCH_ASSOC)) {
        $equipe = new \Model\Equipe($donnees);
    ?>
        <option value=<?php echo $equipe->getId_equipe(); ?> > 
            <?php echo $equipe->getNom() ; } ?>
        </option>
    </select>

    <input name="URLCSV" type="file" accept=".csv" />
    <input type="submit" >
    
    
</form>
<a title="" href="">M7</a>
<a title="" href="">M9</a>
<a title="" href="">M11</a>
<a title="" href="#">M11F2</a>
<a title="" href="#">M11 2</a>
<a title="" href=""> M13F</a>
<a title="" href=""> M13M</a>
<a title="" href=""> M15F</a>
<a title="" href=""> M15M</a>
<a title="" href="http://www.ffvbbeach.org/ffvbapp/resu/vbspo_calendrier.php?saison=2017%2F2018&codent=LILR&poule=7F4&calend=COMPLET&equipe=4&x=4&y=4">
    M17F</a>
<a title="" href="http://www.ffvbbeach.org/ffvbapp/resu/vbspo_calendrier.php?saison=2017%2F2018&codent=LILR&poule=7M1&calend=COMPLET&equipe=3&x=6&y=2">
    M17M</a>


<a title="" href="http://www.ffvbbeach.org/ffvbapp/resu/vbspo_calendrier.php?saison=2017%2F2018&codent=LILR&poule=R2F&calend=COMPLET&equipe=4&x=5&y=3">
    R2F</a>
<a title="" href="http://www.ffvbbeach.org/ffvbapp/resu/vbspo_calendrier.php?saison=2017%2F2018&codent=LILR&poule=PF4&calend=COMPLET&equipe=4&x=5&y=6">
    PNF</a>
 <div class="card-footer text-muted">
</div> 
</body>
</html>
