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

<section class="page-section cta" style="background:#B22222">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="cta-inner text-center rounded">
                    <script>
                        $(document).ready(function () {

                            $('#calendar').fullCalendar({
                                aspectRatio: 1.2,
                                contentHeight: 600,

                                locale: 'fr',
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay,listWeek'
                                },
                                defaultDate: <?php $today = date('m/j/y');
                                    echo "'$today'";
                                ?>,
                                navLinks: true, // can click day/week names to navigate views
                                editable: false,
                                eventLimit: true, // allow more link when too many events
                                events: [
<?php
$db = AccesBDD::connectBDD();
$t = new calendrierControlleur($db);
if (isset($_POST['equipe_id'])){
  $te = $t->getMatch($_POST['equipe_id']);
  
}else
{
    $te = $t->getMatch(0);
   
}
?>
                                ]});
                        })
                    </script>
                    <br/>
                    <div id='calendar'></div>


                    <style>



                        #calendar {
                            max-width: 1200px;
                            margin: 0 auto;
                        }

                    </style>
               
                </div>
                <form method="post" action="calendrier.php">

                        <select name="equipe_id">
                            <?php
                            $eq = new equipeControlleur($db);
                            $eqga = $eq->getAll();
                            while ($donnees = $eqga->fetch(PDO::FETCH_ASSOC)) {
                                $equipe = new \Model\Equipe($donnees);
                                ?>
                                <option value=<?php echo $equipe->getId_equipe(); ?> > 
    <?php echo $equipe->getNom();
} ?>
                            </option>
                        </select>
                    <input type="submit" name="filtrer" value="filtrer">


                    </form>
                        <?php
if (isset($_SESSION['identifiant'])) {

?>
                                          <form method="post" action="testCSV.php">

                        <select name="equipe_id">
                            <?php
                            $eq = new equipeControlleur($db);
                            $eqga = $eq->getAll();
                            while ($donnees = $eqga->fetch(PDO::FETCH_ASSOC)) {
                                $equipe = new \Model\Equipe($donnees);
                                ?>
                                <option value=<?php echo $equipe->getId_equipe(); ?> > 
    <?php echo $equipe->getNom();
} ?>
                            </option>
                        </select>
                        <input name="URLCSV" type="file" accept=".csv" />
                        <input type="submit" >


                    </form>
                <?php }
?> 
            </div>
        </div>
    </div>
</section>



</body>
</html>
