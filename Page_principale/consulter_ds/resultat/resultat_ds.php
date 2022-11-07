<?php
if(isset($_POST['date-d']) && isset($_POST['date-f']))
{
$date_debut = $_POST['date-d'];
$date_fin   = $_POST['date-f'];

require("../../Connexion_BD/connexion.php");

$query_ds = "SELECT NOM_FILIERE,NOM_MODULE,NOM_PROFESSEUR,JOUR,HEURE,NOM_SALLE
                FROM module m INNER JOIN reservation r ON m.id_module = r.id_module
                INNER JOIN filiere f ON f.id_filiere = r.id_filiere
                INNER JOIN salle s ON s.id_salle = r.id_salle
                INNER JOIN professeur p ON p.id_professeur = r.id_professeur
                WHERE TYPE_RESERVATION='ds' AND Jour BETWEEN '".$date_debut."' and '".$date_fin."' ORDER BY JOUR,HEURE";
$resultat_ds = mysqli_query($connexion,$query_ds);

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/resultat_ds.css" >
  <link rel="stylesheet" href="./css/print.css"  media="print" />

    <title>
       DS
    </title>


</head>
<body>

<table class="table table-striped">
<caption><h2>Liste des DS <h2></caption>
        <tr>
             <th> Filière    </th>
             <th> Module  </th>
             <th> Professeur </th>
             <th> Jour        </th>
             <th> Heure       </th>
             <th> Salle </th>
        </tr>
        <?php
        if($resultat_ds)
        {
        while($row = mysqli_fetch_assoc($resultat_ds))
        {
            $fill = $row['NOM_FILIERE'];
            $mod  = $row['NOM_MODULE'];
            $prof = $row['NOM_PROFESSEUR'];
            $jr   = $row['JOUR'];
            $hr   = $row['HEURE'];
            $sal  = $row['NOM_SALLE'];


        echo("
        <tr>
            <td>".$fill."</td><td>".$mod."</td> <td>".$prof."</td><td>".$jr."</td><td>".$hr."</td><td>".$sal."</td>
        </tr>
        ");
        }
        }else
        {
        echo "false";
        }
        ?>

    </table>
    <br>
    <div class="dernier_button">
      <button id="impression" onclick="window.print()"><a href="../../index.php">Imprimer</a></button>
      <button id="impression"><a href="../../index.php">Retour</a></button>

    </div>

</body>
</html>

<?php 
}
?>