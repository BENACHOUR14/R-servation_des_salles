<?php
session_start();

require('../../Connexion_BD/connexion.php');

if(isset($_POST['save'])){

    $nom=$_POST['nom'];
    if(!empty($nom)){

        // comparer la filiere ajouter avec les filieres qui existe déja 
        $Fil_exist="select * from filiere where NOM_FILIERE='".$nom."'";
        $result_exist=mysqli_query($connexion,$Fil_exist);
        
        
        if(mysqli_num_rows($result_exist)  > 0 )
        {
            
            $_SESSION['message']="Cette filière existe déja !";
            $_SESSION['msg_type']="warning";
            header('Location: ./filiere.php?cnx=1');

        }else{
            $save_data="INSERT INTO filiere (NOM_FILIERE) VALUE ('$nom')";
            $result_save=mysqli_query($connexion,$save_data);
    
            $_SESSION['message']="vous avez ajouté une nouvelle filière";
            $_SESSION['msg_type']="success";
    
            header('Location: ./filiere.php?cnx=1');
        }
            
        
    }else{
        $_SESSION['message']="veuillez remplir le nom de la filière !";
        $_SESSION['msg_type']="warning";
        header('Location: ./filiere.php?cnx=1');
        
    }
    

    
}

// delete button

if(isset($_POST['delete']))
{

    $id_fil=$_POST['delete_id'];
    

    $delete_fil="DELETE FROM filiere WHERE ID_FILIERE=$id_fil";
    $result_delete=mysqli_query($connexion,$delete_fil);

    $_SESSION['message']="vous avez supprimé une filière";
    $_SESSION['msg_type']="danger";
    header('Location: ./filiere.php?cnx=1');
}
    
?>