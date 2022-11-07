<?php
session_start();

require('../../Connexion_BD/connexion.php');


if(isset($_POST['save_p']))
{

    $nom=$_POST['nom_p'];
    if(!empty($nom)){

        // comparer la filiere ajouter avec les filieres qui existe déja 
        $prof_exist="select * from professeur where NOM_PROFESSEUR='".$nom."'";
        $result_exist=mysqli_query($connexion,$prof_exist);
        
        
        if(mysqli_num_rows($result_exist)  > 0 )
        {
            
            $_SESSION['message']="le professeur que vous avez entré existe déja !";
            $_SESSION['msg_type']="warning";
            header('Location: ./prof.php?cnx=1');

        }else{
            $save_data="INSERT INTO professeur (NOM_PROFESSEUR) VALUE ('$nom')";
            $result_save=mysqli_query($connexion,$save_data);
    
            $_SESSION['message']="vous avez ajouté un nouveau professeur";
            $_SESSION['msg_type']="success";
    
            header('Location: ./prof.php?cnx=1');
        }
            
        
    }else{
        $_SESSION['message']="veuillez remplir le nom du professeur que vous voulez ajouter !";
        $_SESSION['msg_type']="warning";
        header('Location: ./prof.php?cnx=1');
        
    }
    

    
}

// delete button professeur

if(isset($_POST['delete_p']))
{

    $id_prof=$_POST['delete_id_p'];
    

    $delete_prof="DELETE FROM professeur WHERE ID_PROFESSEUR='".$id_prof."'";
    $result_delete=mysqli_query($connexion,$delete_prof);

    $_SESSION['message']="vous avez supprimé un professeur";
    $_SESSION['msg_type']="danger";
    header('Location: ./prof.php?cnx=1');
}
    

?>