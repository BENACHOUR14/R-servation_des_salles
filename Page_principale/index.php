<?php 
session_start();
if (isset($_SESSION['login']))
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Page principale</title>

        <link rel="stylesheet" href="./style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="./js/app.js"></script>

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    </head>
    <body>
      <h1>Réservation des salles de l'ESTO</h1>
      <div class="main_container">
        <div class='interface'>
            <h2><i class="far fa-calendar-check"></i> Réservation</h2>
            <div class='dropdown'>
              <ul>
                <a href="./reservation_par_salle/choisir/date-salle.php" target="_blank"><li>Réservation par salle</li></a>
                <a href="./reservation/calendrier/calendrier.html" target="_blank"><li>Réservation par date</li></a>
              </ul>
            </div>
        </div>

        <div class='interface'>
            <h2><i class="far fa-dot-circle"></i> Consultation</h2>
            <div class='dropdown'>
                <ul>
                  <a href="./consulter_reservation/choisir/choisir_date_salle.php" ><li>Consulter réservation</li></a>
                  <a href="./consulter_ds/choisir/choisir_date.php" ><li>Consulter DS</li></a>
                </ul>
            </div>
        </div>

        <div class='interface'>
            <h2><i class="far fa-edit"></i> Modification</h2>
            <div class='dropdown'>
              <ul>
                <a href="./Modification/filiere/filiere.php?cnx=1"><li>Filières</li></a>
                <a href="./Modification/module/module.php?cnx=1"><li>Modules</li></a>
                <a href="./Modification/profs/prof.php?cnx=1"><li>Professeurs</li></a>
              </ul>
            </div>
        </div>

      </div>
    </body>
</html>

<?php 
}
?>

