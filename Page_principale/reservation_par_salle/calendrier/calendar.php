<?php

// $year = $_GET['annee'];
// $month  = $_GET['mois'];

require("../../Connexion_BD/connexion.php");

function build_calendar($month,$year)
{
  require("../../Connexion_BD/connexion.php");
  $salle = $_GET['salle'];
   // first of all will create an array containing names of all days in a week
  $DaysOfWeeks=array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');

  // then will get the first day of the month that is in the argument of this function
  $FirstDayOfMonth=mktime(0,0,0,(int)$month,1,$year);
//    $FirstDayOfMonth=new DateTime("$year-$month-1");
        

  // now getting the number of day in month
  $numberDays=date('t',$FirstDayOfMonth); // t -The number of days in the given month
 
  // getting some information about the first day of this month
  $dateComponents = getdate($FirstDayOfMonth);

  //getting the name of this month
  $mois_nom = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décemebre");
  $monthName = $mois_nom[$month-1];
  // $dateComponents['month'];

  //getting the index value 0-6 of the first of this month
  $dayOfWeek=$dateComponents['wday']; // [wday] - day of the week (0=Sunday, 1=Monday,...)

  //getting the current day
  $dateToday=date('Y-m-d');

  //now creatting the html table
  $calendar="<table class='table table-bordered'>";
  $calendar.="<center><h1>$monthName $year </h1>";

    // $calendar.="<a class='btn  btn-primary' href='?month=".($month-1)."&year=".$year."'>&lt </a>";
    // $calendar.=" <a class='btn btn-primary' href='?mois=".$month."&annee=".$year."&salle='".$salle."''> Month </a>";
    // $calendar.=" <a class='btn btn-primary' href='?month=".($month+1)."&year=".$year."'>&gt </a></center> <br>";

  $calendar.=" <tr>";

  //creating the calendar headers
  foreach($DaysOfWeeks as $day)
  {
    $calendar.="<th class='header'>$day</th>";
  }

  $calendar.="</tr><tr>";

  // the variable $dayOfWeek will make sure that there must be only 7 columns on our table
  if( $dayOfWeek>0 )
  {
    for($i=0;$i<$dayOfWeek;$i++)
    {
      $calendar.="<td></td>";
    }
  }

  // initialling the day counter
  $currentDay=1;
  
  //getting the month number
  $month=str_pad($month,2,'0',STR_PAD_LEFT);
  while( $currentDay <= $numberDays )
  {

    // in seventh columns (samedi) reached,start a new row(week)

    if($dayOfWeek==7)
    {
      $dayOfWeek=0;
      $calendar.="<tr></tr>";
    }
    $currentDayRel=str_pad($currentDay,2,'0',STR_PAD_LEFT);
    $date="$year-$month-$currentDayRel";
      
    //strtolower help to show a name fon day with tinyletter (miniscule)
    
    $dayname=strtolower(date('l',strtotime($date)));  

    $reservation = [];
    $query_reservation = "SELECT HEURE,JOUR FROM reservation WHERE  ID_SALLE= '$salle' AND year(JOUR)=$year AND month(JOUR)=$month AND day(JOUR)=$currentDay";
    $resultat_reservation = mysqli_query($connexion,$query_reservation);
    while($rows_reservation = mysqli_fetch_assoc($resultat_reservation))
    {
         array_push($reservation, $rows_reservation['HEURE']);
    }

             
      $calendar.="<td><a href='../choix/choix.php?salle=$salle&jour=$currentDay&mois=$month&annee=$year'><h4>$currentDay<br>
      ".(in_array('08:00 - 10:00', $reservation)    ? '<button class=\'btn btn-danger btn-xs\'>1</button>' : '<a class=\'btn btn-success btn-xs\'>1</a>').
      (in_array('10:00 - 12:00', $reservation)    ? '<button class=\'btn btn-danger btn-xs\'>2</button>' : '<a class=\'btn btn-success btn-xs\'>2</a>').
      (in_array('12:00 - 14:00', $reservation)    ? '<button class=\'btn btn-danger btn-xs\'>3</button>' : '<a class=\'btn btn-success btn-xs\'>3</a>').
      (in_array('14:00 - 16:00', $reservation)    ? '<button class=\'btn btn-danger btn-xs\'>4</button>' : '<a class=\'btn btn-success btn-xs\'>4</a>').
      (in_array('16:00 - 18:00', $reservation)    ? '<button class=\'btn btn-danger btn-xs\'>5</button>' : '<a class=\'btn btn-success btn-xs\'>5 </a>').
      "</h4></a></td>";
      
    

    // $today = $date == date('Y-m-d')? "today" : "";
    // if($date<date('Y-m-d'))
    // {
    //   $calendar = "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
    // }else
    // {
    //   $calendar = "<td class='$today'><h4>$currentDay</h4> <a class='btn btn-success btn-xs'>Book</a>";
    // }

    // incrementing the counters
    $currentDay++;
    $dayOfWeek++;
  }

  // Completing the row of the last week in month, if necessary
  if($dayOfWeek!=7)
  {
    $remainingDays=7-$dayOfWeek;
    for($i=0;$i<$remainingDays;$i++)
    {
      $calendar.="<td></td>";
    }
  }
  $calendar.="</tr>";
  $calendar.="</table>";

  echo $calendar;

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Calendrier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/calendar.css">
  </head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">

    <?php
       $dateComponents=getdate();
       
      
       if(isset($_GET['mois']) && isset($_GET['annee']) && isset($_GET['salle']))
       {
        $month=$_GET['mois'];
        $year=$_GET['annee'];
        $salle = $_GET['salle'];
        echo build_calendar($month,$year);

       }else{
        $month=date('n');
        $year=date('Y');
        // $salle = $_GET['salle'];

           
       }
//        echo "$month $year";

      

    ?>

    </div>
       

  </div>
</div>
  
</body>
</html>