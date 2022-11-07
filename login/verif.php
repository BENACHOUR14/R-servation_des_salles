<?php

 session_start();

 if(isset($_POST['username']) && isset($_POST['username']))
 {

    require("../Page_principale/Connexion_BD/connexion.php");
    $email = $_POST['username'];
    $password = $_POST['password'];



       if($email !== "" && $password !== "")
       {

          $requete = "SELECT ID_USER,EMAIL,USERNAME,MOT_DE_PASSE FROM user  WHERE  EMAIL='".$email."' OR USERNAME='".$email."'  ";

          $exec_requete = mysqli_query($connexion,$requete);

          if(mysqli_num_rows($exec_requete) > 0)
          {

             while($row = mysqli_fetch_assoc($exec_requete))
             {

                if($password == $row['MOT_DE_PASSE'])
                {
                     header('Location: ../Page_principale/index.php');
                        $_SESSION['login'] = 'login';
                }


                else
                {
                   header('Location: ../index.php?erreur=1');

                }

            }
          }

      else
      {
         header('Location: ../index.php?erreur=1');

      }
   }
   else
   {
      header('Location: ../index.php?erreur=2');

   }
}
else
{
   header('Location: ../index.php');


}

?>
