<?php

session_start();
if (isset($_SESSION['login']))
{
require("../../Connexion_BD/connexion.php");

$query_salles = "select * from salle";
$resultat_salles = mysqli_query($connexion,$query_salles);
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
            <title>
                Consulter Réservation
            </title>

            <link rel="stylesheet" href="./css/choisir_date_salle.css">

    </head>

<body>


        <form action="../resultat/resultat_reservation" method="GET" onSubmit="return valider()">
        <h1>Consulter Les Réservations</h1>
        <div class="container">
          <div class="Element">
              <label for="salles">Salle</label><br><br>
              <img src="./img/salle.jpg">         <br><br>
                  <select  id="salle" name="salles" class="select" required>
                      <option disabled="" selected="" value="null">--Choisissez La Salle</option>
                          <?php
                              while($rows_salle = mysqli_fetch_assoc($resultat_salles))
                                  {
                                      $nom_salle = $rows_salle['NOM_SALLE'];
                                      echo "<option >".$nom_salle."</option>";
                                  }
                              ?>
                  </select>
          </div>


          <div class="Element">
              <label for="date">Date</label><br><br>
              <img src="./img/annee.jpg">      <br><br>
              <input name="date" type="date"  id="date">
          </div>
        </div>


            <br>

            <!-- <button type="Submit" onclick="valider()">Afficher</button> -->
            <button type="submit" class="button button_submit" onclick="valider()" style="vertical-align:middle"><span>Suivant </span></button>


        </form>
        <script src="./js/app.js"></script>
</body>
</html>

<?php
}
?>
