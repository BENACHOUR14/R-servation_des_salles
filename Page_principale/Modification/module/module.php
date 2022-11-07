<?php

if (isset($_GET["cnx"]))
{
require('../../Connexion_BD/connexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
  <script src="./js/app.js"></script>
  <title>Les modules</title>
</head>
<body>



<div class="container">
<center>
  <div class="jumbotron">

      <div class="card">
        <a href='../../index.php'  class='btn btn-info' style="color : #fff ; font-weight : bold" >&lt Retour </a>
        <h2 style="color:#0dc16f">Liste Des Modules</h2>
      </div>

      <div class="card">
      <!-- Button trigger modal Insert -->
        <div class="card-body">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addfilModal">ajoute filière</button>  -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="nom_filiere">Options</label>
                </div>

                <select class="custom-select" name="nom_filiere" id="nom_filiere" onchange="get_modules()">
                    <option name="choose" id="choose" selected="" disabled="">choisissez une filière</option>
                    <?php

                            $requet_filiere="select * from filiere ";
                            $result_filiere=mysqli_query($connexion,$requet_filiere);

                            while($Fil=mysqli_fetch_assoc($result_filiere)){

                            echo '<option  value='.$Fil['ID_FILIERE'].'>'.$Fil['NOM_FILIERE'].'</option>';

                            }
                    ?>
                    
                </select>

            </div>
          </div>

     
     </div>
     
      <!-- show messages error -->
      <div class="show_message">
                      
                      <?php  require('save_module.php'); ?>
                      <?php 
                        if(isset($_SESSION['message'])) :?>
        
                        <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
        
                                  <?php
                                  echo '<h3>'.$_SESSION['message'].'</h3>';
                                  unset ($_SESSION['message']);
                                  
                                  ?>
                                  
                                  
                        </div>
                        <?php endif ?>
      </div>
      
    

     <div class="card">
        <div class="card-body" id="modules">

        
        
        
        
      </div>     
     
     
</div>

</center>
</div>







<script src="./js/getModule.js"></script>

</body>
</html>

<?php 
}
?>