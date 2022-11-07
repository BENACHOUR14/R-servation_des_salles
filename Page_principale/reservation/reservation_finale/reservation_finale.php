<?php

if (isset($_GET['jour']) && isset($_GET['mois']) && isset($_GET['annee']))
{
require("../../Connexion_BD/connexion.php");

$query_profs = "select * from professeur";
$resultat_profs = mysqli_query($connexion,$query_profs);

$query_filliere = "select * from filiere";
$resultat_filliere = mysqli_query($connexion,$query_filliere);

$query_salle = "SELECT NOM_SALLE FROM salle WHERE ID_SALLE='".$_GET['salles']."'";
$resultat_salle = mysqli_query($connexion,$query_salle);

$jour=$_GET['jour'];
$mois=$_GET['mois'];
$annee=$_GET['annee'];
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <title>
      Réservation
    </title>
 
    <link rel="stylesheet" href="./css/reservation_finale.css">

</head>

<body>

    <div class="all">
    <div class="date"><h1> <?php print ("Le ".$jour." - ".$mois." - ".$annee."<br><br> à ".$_GET['heure'] ) ?></h1></div><div class="heure">

    <div>
    <form method="POST" action="./insertion_donnes.php" onSubmit="return valider()">

    <input type="hidden" name="jour" value="<?php echo $jour.'-'.$mois.'-'.$annee ?>">
    <input type="hidden" name="heure" value="<?php echo $_GET['heure']?>">

        <table>
            <tr>
                <td>
                <div class="positionnement">
                    <label for="salles" >Salle :<br></label>
                    <input id="salle" type="text" name="salles" value="<?php
                                                                            $rows_sales = mysqli_fetch_assoc($resultat_salle);
                                                                            $nom_salle = $rows_sales['NOM_SALLE'];
                                                                            echo $nom_salle;
                                                                            ?>" class="select" readonly>
                    <input type="hidden" name="salles" value="<?php echo $_GET['salles'] ?>">
                </div>
                </td>

                <td>
                <div class="positionnement">
                    <label for="profs" >Professeurs :</label><br>
                    <select name="profs" class="select" id="profs">
                        <option disabled="" selected="" value="null">--Choisissez le prof</option>
                        <?php
                         while($rows_profs = mysqli_fetch_assoc($resultat_profs))
                         {
                        $id_profs = $rows_profs['ID_PROFESSEUR'];
                        $nom_profs=$rows_profs['NOM_PROFESSEUR'];
                        echo "<option value=".$id_profs.">$nom_profs</option>";
                         }
                        ?>
                    </select>
                </div>
                </td>
            </tr>

            <tr>
                <td>
                <div class="positionnement">
                <label for="type-reservation" >Type de réservation :<br></label>
                    <select onchange="get_type_reservation()" id="type_reservation" name="type-reservation" class="select">
                        <option disabled="" selected="" value="null">--Choississez le type de reservation</option>
                        <option name="cours" value="Cours">Cours</option>
                        <option name="tp"   value="TD/TP">TD/TP</option>
                        <option name="ds"  value="DS" >DS</option>
                    </select>
                </td>
                
                <td>
                    <label for="Capacite" >Capacité :<br></label>
                    <input id="capacite_salle" type="text" name="Capacite" value="" class="select" readonly>
                </div>
                </td>
            </tr>    
             

                
            <tr>
                <td>    
                <div class="positionnement">
                    <label for="filliere" >Filière :</label><br>
                    <select id="filieres" onchange="get_modules()" name="filliere" class="select">
                        <option disabled="" selected="" value="null">--Choisissez la filière</option>
                        <?php
                         while($rows_filliere = mysqli_fetch_assoc($resultat_filliere))
                         {
                        $id_filiere=$rows_filliere['ID_FILIERE'];     
                        $nom_filliere=$rows_filliere['NOM_FILIERE'];
                        echo "<option value=".$id_filiere.">$nom_filliere</option>";
                         }
                        ?>
                        
                    </select>
                </div>
                </td>
                        
                <td>
                <div class="positionnement">
                    <label for="modules">Modules :</label><br>
                    <select id="modules" name="modules" class="select">
                        <option disabled="" selected=""></option>
                    </select>
                </div>
                </td>
            </tr>
        </table>    
                <div class="positionnement">
                    <button type="submit" onclick="valider()">Réserver</button>
                    <button type="reset">Annuler</button>
                </div>
                
           
    </form>
    </div>   
    </div> 
    <script src="js/app.js"></script>
</body>
</html>

<?php
}
?>