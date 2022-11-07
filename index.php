<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Page d'accueil</title>

        <link rel="stylesheet" href="./index.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="./js/app.js"></script>

        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    </head>

    <body>
        <div class="main_container">
            <div class='interface1'>
              <img src="./img/logo.png" class="center">
              <h1 id="main_title">Réservation des salles de l'ESTO</h1>
              <div align="center"><a id="plat_button" href="#" rel="nofollow noopener">Acceder a la plateforme</a></div>
            </div>

            <div class="interface2">
              <div class="login-box">

                  <img src="./login/img/avatar.png" class="avatar">
                      <h1>Login</h1>
                      <form action="./login/verif.php" method="POST">
                          <p>Nom d'Utilisateur ou E-mail</p>
                          <input type="text" name="username" placeholder="Enter Username">
                          <p>Mot de passe</p>
                          <input type="password" name="password" placeholder="Enter Password">
                          <input type="submit" name="submit" value="Login">
                          <?php
                              if(isset($_GET['erreur']))
                              {
                                  $err = $_GET['erreur'];
                                  if($err==1 || $err==2)
                                      echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";

                              }
                          ?>

                      </form>

            </div>

          </div>
        </div>
        <script>
        $(document).ready(function(){

            if (window.location.href.includes('erreur'))
            {
              $(".interface2").show()
              $(".interface1").hide()
            }
            else {
              $(".interface2").hide()
            }

            $("#plat_button").click(function(){
              $(".interface1").slideUp()
              $(".interface2").show(1500)
            });

        });

        </script>
        </body>

</html>
