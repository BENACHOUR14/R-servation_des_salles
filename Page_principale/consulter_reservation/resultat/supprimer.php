<?php

require("../../Connexion_BD/connexion.php");

$id = $_GET['id_reserv'];
$salle = $_GET['salle'];
$date = $_GET['date'];

echo ("<script>Est-ce-que vous voulez supprimer ?</script>");


$stmt = $connexion->prepare("DELETE FROM reservation WHERE id_reservation=".$id."");

$stmt -> execute();
$stmt -> close();

header('Location: ./resultat_reservation.php?salles='.$salle.'&date='.$date.'');