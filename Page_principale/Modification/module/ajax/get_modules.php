
<?php
 
 require('../../../Connexion_BD/connexion.php');

$option_selected=$_GET["option_selected"];
if(isset($option_selected))
{
    $query_module='select * from module where ID_FILIERE="'.$option_selected.'"';
    $result_module=mysqli_query($connexion,$query_module);


        
        
        echo    '<table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Modules</th>
                            <th class="text-right">Action</th> 
                        </tr> 
                    </thead>';
                    

    while($row=mysqli_fetch_assoc($result_module))
    {
      $id_module=$row['ID_MODULE'];
      
      
                
        echo            '<tr>
                            
                            <td id="adt" style="display:none;">'.$row['ID_FILIERE'].'</td>
                            <td>'.$row['NOM_MODULE'].'</td>
                            <td align="right"><button class="btn btn-success btn-sm " onclick="editModal(\''.$id_module.'\')"  name="edit_m">modifier</button> <button  class="btn btn-danger btn-sm sup_m"  onclick="deleteModal('.$id_module.')" id="sup_m"  name="sup_m">supprimer</button></td>
                   
                        </tr>' ;

        
              
    }
    
    echo '</table>';

        echo '<center><button  class="btn btn-primary btn-lg admit" onclick="getModal()" >ajout module</button></center> ' ;
    

}

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
  
  <title>Gestion de la BD </title>



  
</head>
<body>


<!-- Modal add a new module -->
<div class="modal fade" id="addmoduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="./save_module.php" method="POST">
          <div class="modal-body">
                <div class="form-group">

                    <!-- <label>Nom Module</label> -->
                    <input class="form-control" type="text" name="nom_m" id="nom_m" placeholder="Entrer le nom de module" >
                    <input type="hidden" name="hidden_id" id="hidden_id">      
                </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary"  name="save_m">Sauvegarder</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Supprimer un Module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="./save_module.php" method="POST">
            <div class="modal-body">
                  
              <input type="hidden" name="delete_id" id="delete_id">
              <h4>Vous êtez sur de supprimer ce Module ?</h4>
                  
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
              <button type="submit" class="btn btn-primary" name="delete_m" id="delete_m">Oui</button>

            </div>

      </form>

    </div>
  </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier un Module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="./save_module.php" method="POST">
            <div class="modal-body">
            <div class="form-group">
            <?php
                $req='select * from module where ID_FILIERE="'.$option_selected.'"';
                $req_result=mysqli_query($connexion,$req);
                $req_row=mysqli_fetch_assoc($req_result);
            
            ?>

              
              <input class="form-control" type="text" name="nom_m_edit" id="nom_m_edit"  placeholder="Modifier le module" >
              <input type="hidden" name="edit_id" id="edit_id">
              </div>
                  
              
              
                  
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary" name="edit_m" id="edit_m">Sauvegarder</button>

            </div>

      </form>

    </div>
  </div>
</div>















    
</body>
</html>