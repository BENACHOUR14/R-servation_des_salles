<?php
session_start();

if (isset($_SESSION['login']))
{

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">

    <title>
DS
    </title>

    <link rel="stylesheet" href="./css/choisir_date.css">
</head>
<body>
  <h1>Consulter Les DS</h1>
    <div class="outer_container">
      <form  method="POST" action="../resultat/resultat_ds.php">
        <div class="inner_container">
          <div>
            <label for="date-d">Date debut</label> <br>
            <img src="./img/calendar.png" alt="">
            <input name="date-d" type="date" >
          </div>

          <div>
            <label for="date-f">Date fin</label><br>
            <img src="./img/calendar.png" alt="">
            <input name="date-f" type="date">
          </div>


        </div>

          <button type="submit" >Afficher</button>
      </form>
    </div>



</body>
</html>

<?php 
}
?>