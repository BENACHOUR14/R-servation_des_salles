<?php

$option_selected = ($_GET['option_selected']);
$salle = ($_GET['salle']);

if(isset($option_selected)){

    require("../../../Connexion_BD/connexion.php");

    
    $connexion= mysqli_connect($hostname,$username,$password,$databaseName);
    $to_get = ( $option_selected == 'Cours' || $option_selected == 'TD/TP' ) ? 'CAPACITE_COURS' : 'CAPACITE_EXAMEN';
    $query_capacite = 'SELECT '.$to_get.' FROM SALLE WHERE NOM_SALLE=\''.$salle.'\'';
    $resultat_capacite = mysqli_query($connexion,$query_capacite);
    $rows_capacite = mysqli_fetch_assoc($resultat_capacite);
    echo($rows_capacite[$to_get]);

}
