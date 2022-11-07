<?php

if(isset($_GET['annee'])){
    require("../../../Connexion_BD/connexion.php");
    
    $jour = $_GET['jour'];
    $mois = $_GET['mois'];
    $annee = $_GET['annee'];
    $salle = $_GET['salle'];
    $date = $annee.'-'.$mois.'-'.$jour;
    $reservation = [];
    $query_reservation = "SELECT HEURE FROM reservation WHERE ID_SALLE= '$salle' AND JOUR='$date'";
    $resultat_reservation = mysqli_query($connexion,$query_reservation);
    while($rows_reservation = mysqli_fetch_assoc($resultat_reservation))
        {
            array_push($reservation, $rows_reservation['HEURE']);
        }
        $boite = <<<HTML
        <tr >
             <th> Horaires </th> <th> Résérvation des salles </th>
        </tr>
HTML;


        $boite .= <<<HTML
            <tr> 
                <td style="font-weight :bold ; color:#2c3e50;"> 08:00 - 10:00 </td>
HTML;
                 if (in_array('08:00 - 10:00', $reservation)) {
                     $boite .= <<<HTML
                    <td><button class="button_reserve" type="button" style="color :#10FF33" name="heure" value="08:00 - 10:00"></button></td>
HTML;
                 }else {
                     $boite .=<<<HTML
                    <td><button class="button_non_reserve" type="submit" onclick="valider()" name="heure" value="08:00 - 10:00"></button></td>
                 </tr>
HTML;
                 }
/////////////////////////////////////////////////////////////////////////////////////////////////
        $boite .= <<<HTML
        <tr> 
            <td style="font-weight :bold ; color:#2c3e50;"> 10:00 - 12:00 </td>
HTML;
            if (in_array('10:00 - 12:00', $reservation)) {
                $boite .= <<<HTML
                <td><button class="button_reserve" type="button" style="color :#10FF33" name="heure" value="10:00 - 12:00"></button></td>
HTML;
            }else {
                $boite .=<<<HTML
                <td><button class="button_non_reserve" type="submit" onclick="valider()" name="heure" value="10:00 - 12:00"></button></td>
            </tr>
HTML;
//////////////////////////////////////////////////////////////////////////////////////////////
            }  
            $boite .= <<<HTML
            <tr> 
                <td style="font-weight :bold ; color:#2c3e50;"> 12:00 - 14:00 </td>
HTML;
                 if (in_array('12:00 - 14:00', $reservation)) {
                     $boite .= <<<HTML
                    <td><button class="button_reserve" type="button" style="color :#10FF33" name="heure" value="12:00 - 14:00"></button></td>
HTML;
                 }else {
                     $boite .=<<<HTML
                    <td><button class="button_non_reserve" type="submit" onclick="valider()" name="heure" value="12:00 - 14:00"></button></td>
                 </tr>
HTML;
                 }            

/////////////////////////////////////////////////////////////////////////////////////////////////
$boite .= <<<HTML
<tr> 
    <td style="font-weight :bold ; color:#2c3e50;"> 14:00 - 16:00 </td>
HTML;
    if (in_array('14:00 - 16:00', $reservation)) {
        $boite .= <<<HTML
        <td><button class="button_reserve" type="button" style="color :#10FF33" name="heure" value="14:00 - 16:00"></button></td>
HTML;
    }else {
        $boite .=<<<HTML
        <td><button class="button_non_reserve" type="submit" onclick="valider()" name="heure" value="14:00 - 16:00"></button></td>
    </tr>
HTML;
//////////////////////////////////////////////////////////////////////////////////////////////
    }  
    $boite .= <<<HTML
    <tr> 
        <td style="font-weight :bold ; color:#2c3e50;"> 16:00 - 18:00 </td>
HTML;
         if (in_array('16:00 - 18:00', $reservation)) {
             $boite .= <<<HTML
            <td><button class="button_reserve" type="button" style="color :#10FF33" name="heure" value="16:00 - 18:00"></button></td>
HTML;
         }else {
             $boite .=<<<HTML
            <td><button class="button_non_reserve" type="submit" onclick="valider()" name="heure" value="16:00 - 18:00"></button></td>
         </tr>
HTML;
         }  
         //$boite .= $reservation;          

         echo $boite;

    
    
    
}