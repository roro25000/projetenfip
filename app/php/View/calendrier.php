<?php
require("entete.php");
require("../Autoloader.php");

use App\Autoloader;
use AccesBDD;

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

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>


 <div class="card-footer text-muted">
    2 days ago
</div> 
</body>
</html>
