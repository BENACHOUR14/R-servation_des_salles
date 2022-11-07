<?php
if (isset($_GET['salles']) && isset($_GET['date']))
{
$salle = $_GET['salles'];
$date   = $_GET['date'];


require("../../Connexion_BD/connexion.php");

$query_cours = "SELECT ID_RESERVATION,NOM_MODULE,NOM_FILIERE,NOM_SALLE,NOM_PROFESSEUR,JOUR,HEURE,TYPE_RESERVATION 
                FROM module m INNER JOIN reservation r ON m.id_module = r.id_module 
                INNER JOIN filiere f ON f.id_filiere = r.id_filiere 
                INNER JOIN salle s ON s.id_salle = r.id_salle 
                INNER JOIN professeur p ON p.id_professeur = r.id_professeur
                WHERE JOUR='".$date."' AND NOM_SALLE='".$salle."' ORDER BY JOUR,HEURE;";
$resultat_cours = mysqli_query($connexion,$query_cours);


?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>
Les Cours
    </title>
 
    <link rel="stylesheet" href="./css/resultat_reservation.css">
</head>
<body>

    <table class="table table-striped" >
    <caption><h2>Liste Des Réservation</h2></caption>
        <tr>
            <th>Date                </th>
            <th>Salle                </th>
            <th>Heure                </th>
            <th>Professeur           </th>
            <th>Filière             </th>
            <th>Modules              </th>
            <th>Type de Réservation </th>
        </tr>
    
        <?php 
        if($resultat_cours)
        {
        while($row = mysqli_fetch_assoc($resultat_cours))
        {
            $jr   = $row['JOUR'];
            $sal  = $row['NOM_SALLE'];
            $hr   = $row['HEURE']; 
            $prof = $row['NOM_PROFESSEUR'];
            $fill = $row['NOM_FILIERE'];
            $mod  = $row['NOM_MODULE'];
            $ty_res = $row['TYPE_RESERVATION'];
            $id = $row['ID_RESERVATION'];
            
        echo("
        <tr>
            <td>".$jr."</td><td>".$sal."</td><td>".$hr."</td><td>".$prof."</td><td>".$fill."</td>
            <td>".$mod."</td><td>".$ty_res."</td><td id='supp'><button onClick='Confirm($id)'><a>Supprimer</a></button></td>            
        </tr>
        ");
        }
        }else
        {
        return "false";
        }   
        ?>
    </table>
    <input name='salle' id='salle' type='hidden' value='<?php echo $salle ?>'>
    <input name='date'  id='date'type='hidden' value='<?php echo $date ?>'>
    
    <a href="../../index.php"><button class="btn btn-default">Retour</a>
    <script src="./js/app.js"></script>
</body>
</html>


<?php
}
?>