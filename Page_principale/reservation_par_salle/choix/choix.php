<?php

if (isset($_GET['salle']))
{
require("../../Connexion_BD/connexion.php");

$salle = $_GET['salle'];
$query_salles = "SELECT * FROM salle WHERE ID_SALLE=$salle";
$resultat_salles = mysqli_query($connexion,$query_salles);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    
        <title>Salle / Heure</title>
 
        <link rel="stylesheet" href="./css/choix.css">
        
        <script>


            const func = (choix) => 
            {
                let salle = choix.options[choix.selectedIndex].value;
                console.log(salle);
                
                var jour = document.getElementById('jour').value;
                var mois = document.getElementById('mois').value;
                var annee = document.getElementById('annee').value;
                params = "jour="+jour+"&mois="+mois+"&annee="+annee+'&salle='+salle;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', './ajax/get_reservation.php?'+params, true);

                xhr.onload = function(){
            // document.getElementById('capacite_salle').value = this.responseText;
                document.getElementById('reservation_bloc').innerHTML = this.responseText;
            }

                xhr.send();

            }
        </script>

    </head>

    <body>

        <div class="Element">
            <label for="salles" style="margin:75px;">Salle :<br></label>
            <input type="text" id="salles" name="salles" class="select" onload="func(this)" value="<?php $rows_salle = mysqli_fetch_assoc($resultat_salles); $nom_salle = $rows_salle['NOM_SALLE'];  echo $nom_salle ;?> " readonly>
                    
            <?php 
                $jour = $_GET['jour'];
                $mois = $_GET['mois'];
                $annee = $_GET['annee'];
                $date = $annee.'-'.$mois.'-'.$jour;
                $reservation = [];
                $query_reservation = "select HEURE from reservation WHERE  ID_SALLE= '$salle' AND JOUR='$date'";
                $resultat_reservation = mysqli_query($connexion,$query_reservation);
                 while($rows_reservation = mysqli_fetch_assoc($resultat_reservation))
                {
                        array_push($reservation, $rows_reservation['HEURE']);
                }

            ?>
        </div>

        <form name="formulaire" method="get" action="../reservation_finale/reservation_finale.php" onSubmit="return valider()" >
       
            <input type="hidden" id="jour" name="jour" value="<?php echo $_GET['jour'] ?>">
            <input type="hidden" id="mois" name="mois" value="<?php echo $_GET['mois'] ?>">
            <input type="hidden" id="annee" name="annee" value="<?php echo $_GET['annee'] ?>">
            <input type="hidden" id="salles" name="salles" value="<?php echo $salle ?>">
    
            
            
    
<br>
            <table class="table2" id="reservation_bloc">
                <tr>
                    <th> Horaires </th> <th> Résérvation des salles </th>
                </tr>
                <tr> 
                    <td style="font-weight :bold ; color:#2c3e50;"> 08:00 - 10:00 </td>
                    <?php if (in_array('08:00 - 10:00', $reservation)) : ?>
                        <td><button class="button_reserve" type="button" style="color :#10FF33" name="heure" value="08:00 - 10:00"></button></td>
                    <?php else: ?>
                        <td><button class="button_non_reserve" type="submit"  name="heure" value="08:00 - 10:00"></button></td>
                    <?php endif ?>
                </tr>
                <tr> 
                    <td style="font-weight :bold ; color:#2c3e50;"> 10:00 - 12:00 </td> 
                    <?php if (in_array('10:00 - 12:00', $reservation)) : ?>
                        <td><button class="button_reserve" type="button" name="heure" value="10:00 - 12:00" ></button></td>
                    <?php else: ?>
                        <td><button class="button_non_reserve" type="submit"   name="heure" value="10:00 - 12:00"></button></td>
                    <?php endif ?>
                </tr>
                <tr> 
                    <td style="font-weight :bold ; color:#2c3e50;"> 12:00 - 14:00 </td> 
                    <?php if (in_array('12:00 - 14:00', $reservation)) : ?>
                        <td><button class="button_reserve" type="button" name="heure" value="12:00 - 14:00" ></button></td>
                    <?php else: ?>
                        <td><button class="button_non_reserve" type="submit"  style="color :#10FF33" name="heure" value="12:00 - 14:00"></button></td>
                    <?php endif ?>
                </tr>
                <tr> 
                    <td style="font-weight :bold ; color:#2c3e50;"> 14:00 - 16:00 </td>
                    <?php if (in_array('14:00 - 16:00', $reservation)) : ?>
                        <td><button class="button_reserve" type="button" name="heure" value="14:00 - 16:00" ></button></td>
                    <?php else: ?> 
                        <td><button class="button_non_reserve" type="submit"  style="color :#10FF33" name="heure" value="14:00 - 16:00"></button></td>
                    <?php endif ?>
                </tr>
                <tr> 
                    <td style="font-weight :bold ; color:#2c3e50;"> 16:00 - 18:00 </td>
                    <?php if (in_array('16:00 - 18:00', $reservation)) : ?>
                        <td><button class="button_reserve" type="button" name="heure" value="16:00 - 18:00" ></button></td>
                    <?php else: ?> 
                        <td><button class="button_non_reserve" type="submit"  style="color :#10FF33" name="heure" value="16:00 - 18:00"></button></td>
                    <?php endif ?>
                </tr>

            </table>
        </form>
        <br>
        <div class="dernier_button"><button><a href="../../consulter_reservation/choisir/choisir_date_salle.php">Consulter Réservation</a></button> <button><a href="../../index.php">Retour</a></button></div>
    
    </body>
</html>

<?php
}
?>