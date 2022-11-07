<?php
$option_selected = ($_GET['option_selected']);


if(isset($option_selected))
{    
    require("../../../Connexion_BD/connexion.php");

    $query_modules = "SELECT ID_MODULE,NOM_MODULE FROM module WHERE ID_FILIERE='".$option_selected."';";
    $resultat_modules = mysqli_query($connexion,$query_modules);
    
    while($rows_modules = mysqli_fetch_assoc($resultat_modules)) 
    {   
        $id_module = $rows_modules['ID_MODULE'];
        $nom_module = $rows_modules['NOM_MODULE'];
        echo("<option value=".$id_module.">".$nom_module."</option>"."\n");
    }
    
}