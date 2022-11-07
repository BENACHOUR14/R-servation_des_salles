<?php

$jour              = $_POST['jour'];
//$mois              = $_POST['mois'];
//$annee             = $_POST['annee'];
$heure             = $_POST['heure'];
$salle             = $_POST['salles'];
$type_réservation  = $_POST['type-reservation'];
$capacité          = $_POST['Capacite'];
$profs             = $_POST['profs'];
$filliere          = $_POST['filliere'];
$modules           = $_POST['modules'];

require("../../Connexion_BD/connexion.php");

$date = date("Y-m-d",strtotime($jour));

$stmt = $connexion->prepare("insert into reservation(ID_FILIERE,ID_MODULE,ID_SALLE,ID_PROFESSEUR,JOUR,HEURE,TYPE_RESERVATION,CAPACITE)
  values (?,?,?,?,?,?,?,?)");

$stmt -> bind_param("iiiisssi",$filliere,$modules,$salle,$profs,$date,$heure,$type_réservation,$capacité);
$stmt -> execute();
$stmt -> close();

header('Location: ../../index.php');