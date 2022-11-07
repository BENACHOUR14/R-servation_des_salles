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
  
  <title>Les filières</title>
</head>
<body>




<!-- Modal insert filière  -->
<div class="modal fade" id="addfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle filière</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="./save_data.php" method="POST">
            <div class="modal-body">
                  
              <div class="form-group">

                
                <input class="form-control" type="text" name="nom" id="nom" placeholder="Entrer le nom de la filière" >
                
              </div>
                  
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary" name="save" id="save">Sauvgarder</button>

            </div>

      </form>

    </div>
  </div>
</div>

<!-- modal delete button Modal -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer une filière</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="./save_data.php" method="POST">
            <div class="modal-body">
                  
              <input type="hidden" name="delete_id" id="delete_id">

              <h4>Vous êtez sur de supprimer cette filière ?</h4>
                  
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
              <button type="submit" class="btn btn-primary" name="delete" id="delete">Oui</button>

            </div>

      </form>

    </div>
  </div>
</div>



<div class="container">
<center>
  <div class="jumbotron">

      <div class="card">
        <a href='../../index.php'  class='btn btn-info' style="color : #fff ; font-weight : bold" >&lt Retour </a>
        <h2 style="color:#0dc16f">Liste Des Filières</h2>
      </div>

      <div class="card">
      <!-- Button trigger modal Insert -->
        <div class="card-body">
        
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addfilModal">ajout filière</button> 
            

     
     </div>
    <!-- show messages error -->
    <div class="show_message">
                      
                      <?php  require('save_data.php'); ?>
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
    </div>

     <div class="card">
        <div class="card-body">
        <!-- <form action="./delete_data.php" method="POST"> -->
        <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Filières</th>
                  <th class="text-right">Action</th>
            
                </tr> 
              </thead> 
              <?php

                $requet_filiere="select * from filiere ";
                $result_filiere=mysqli_query($connexion,$requet_filiere);

                while($Fil=mysqli_fetch_assoc($result_filiere)){

                  echo ('<tr>
                  <td style="display:none;">'.$Fil['ID_FILIERE'].'</td>
                  <td>'.$Fil['NOM_FILIERE'].'</td>
                  <td align="right">
                  <button class="btn btn-danger btn-sm sup"  name="sup">supprimer</button></td> 
                        
                  </tr>');
        
                }
              ?>
        </table>
        <!-- </form> -->
        
        
      </div>
     
     
     </div>

</center>

</div>


<script>

$(document).ready(function(){
    $('.sup').on('click',function(){

      

      
      $('#deletemodal').modal('show');
      $tr= $(this).closest('tr');

      var data=$tr.children('td').map(function(){

        return $(this).text();

      }).get();

      console.log(data[0]);
      $('#delete_id').val(data[0]);

     


        



    });
});
  



</script>
  
</body>
</html>

<?php 
}
?>