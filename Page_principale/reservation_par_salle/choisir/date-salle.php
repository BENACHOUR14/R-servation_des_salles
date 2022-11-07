<?php
session_start();
if (isset($_SESSION['login']))
{


require("../../Connexion_BD/connexion.php");


$query_salles = "SELECT * FROM salle";
$resultat_salles = mysqli_query($connexion,$query_salles);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Réservation par salle</title>

        <link rel="stylesheet" href="./css/date-salle.css">

        <script src="./js/app.js"></script>
    </head>

    <body>

        <h1>Réservation par salle</h1>

        <form name="choix" method="GET" action="../calendrier/calendar.php" onSubmit="return valider()" >
          <div class="container">
            <div class="items">
              <div class="item">
                  <label for="salle">Salle </label><br><br>
                  <img src="./img/salle.jpg">      <br><br>
                  <select name="salle" class="select" id="salle">
                      <option disabled="" selected="" value="null">--Choississez la salle</option>
                          <?php

                              while($rows_salle = mysqli_fetch_assoc($resultat_salles))
                              {
                                  $id_salle  = $rows_salle['ID_SALLE'];
                                  $nom_salle = $rows_salle['NOM_SALLE'];
                                  echo "<option value=".$id_salle.">$nom_salle</option>";

                              }

                          ?>
                  </select>
              </div>



              <div class="item">
                  <label for="annee">Année </label><br><br>
                  <img src="./img/annee.jpg">      <br><br>
                  <select name="annee" class="select" id="annee" >
                      <option>2019</option>
                      <option selected>2020</option>
                      <option>2021</option>
                      <option>2022</option>
                  </select>
              </div>



              <div class="item">
                  <label for="Mois">Mois</label><br><br>
                  <img src="./img/mois.jpg">    <br><br>
                  <select  name="mois" class="select">
                      <option value="1">Janvier</option>
                      <option value="2">Février</option>
                      <option value="3">Mars</option>
                      <option value="4">Avril</option>
                      <option value="5">Mai</option>
                      <option value="6">Juin</option>
                      <option value="7">Juillet</option>
                      <option value="8">Août</option>
                      <option value="9">Septembre</option>
                      <option value="10">Octobre</option>
                      <option value="11">Novembre</option>
                      <option value="12">Decembre</option>

                  </select>
              </div>
            </div>

            <button type="submit" class="button button_submit"><span>Suivant </span></button>

          </div>






            <!-- <button type="submit">Suivant</button> -->
        </form>
    </body>

</html>

<?php
}
?>


