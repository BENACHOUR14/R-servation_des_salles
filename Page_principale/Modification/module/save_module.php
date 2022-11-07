<?php
session_start();

require('../../Connexion_BD/connexion.php');

//gettin the id of filiere for messages


if(isset($_POST['save_m']))
{
    $getid_filiere=$_POST['hidden_id'];

    $nom_filiere="select * from filiere where ID_FILIERE='".$getid_filiere."'";
    $result=mysqli_query($connexion,$nom_filiere);
    $row=mysqli_fetch_assoc($result);

    

    $nom_m=$_POST['nom_m'];
    $nom_module="select * from module where ID_FILIERE='".$getid_filiere."' and NOM_MODULE='".$nom_m."'  ";
    $result_module_exist=mysqli_query($connexion,$nom_module);




    if(!empty($nom_m))
    {
        if(mysqli_num_rows($result_module_exist) > 0)
        {
            $_SESSION['message']="Le module que vous avez entré existe déja dans ".$row['NOM_FILIERE']."";
            $_SESSION['msg_type']="warning";
            header('Location: ./module.php?cnx=1');
            

        }else{
            $insert_data="INSERT INTO module (NOM_MODULE,ID_FILIERE) VALUES ('$nom_m',$getid_filiere) ";
            $result_insert=mysqli_query($connexion,$insert_data);
    
            $_SESSION['message']="vous avez ajouté un nouveau module dans ".$row['NOM_FILIERE']."";
            $_SESSION['msg_type']="success";
            header('Location: ./module.php?cnx=1');

        }




        
    }else{
        $_SESSION['message']="veuillez remplir le nom du module !";
        $_SESSION['msg_type']="warning";
        header('Location: ./module.php?cnx=1');
    }
}


//delete data
if(isset($_POST['delete_m']))
{

   

    $id_module=$_POST['delete_id'];

    $del="DELETE FROM module where ID_MODULE=".$id_module."";

    $result_delete=mysqli_query($connexion,$del);

    $_SESSION['message']="vous avez supprimé un module ";
    $_SESSION['msg_type']="danger";
    header('Location: ./module.php?cnx=1');
    
}


// edit data
if(isset($_POST['edit_m']))
{
    $new_module=$_POST['nom_m_edit'];

    if(!empty($new_module))
    {
        $id_m=$_POST['edit_id'];
        $req_edit="UPDATE module SET NOM_MODULE='$new_module' WHERE  ID_MODULE=$id_m ";
        $result_edit=mysqli_query($connexion,$req_edit);
        $_SESSION['message']="module modifier avec succés";
        $_SESSION['msg_type']="success";
        header('Location: ./module.php?cnx=1');
        
    }else{

        $_SESSION['message']="veuillez modifié le module !";
        $_SESSION['msg_type']="warning";
        header('Location: ./module.php?cnx=1');
    }

}

?>