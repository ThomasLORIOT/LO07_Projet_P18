<?php
session_start();

require_once '../../Functions/Functions_admin.php';

?>
<!DOCTYPE html>
<!--
    Page home
    

-->
<html>
    <head>
        <title>Nounou</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="admin.php">Admin</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
              <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href='deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container-fluid text-center">    
          <div class="row content">
            <div class="col-sm-2 sidenav">
            </div>
            <div class="col-sm-8 text-left">
              <h1>Bonjour admin, que souhaitez vous faire ?</h1>
              <hr>
              <h3>Informations Générales</h3>
              <ul>
                  <li>Nombre de nounous inscrite : <?php echo(nombreNounousInscrite())?></li>
                  <li>Nombre de candidatures à gérer : <?php echo(nombreCandidatureNounous())?> </li>
              </ul>
              <h3>Candidatures et nounous bloqués</h3>
              <button type="button" class="btn btn-dark" onclick="location.href='admin_candidatures.php'">Candidature</button>
              <h3>Valider les langues proposées</h3>
              <button type="button" class="btn btn-dark" onclick="location.href='admin_langue.php'">Langues</button>
              <h3>Gérer des nounous</h3>
              <button type="button" class="btn btn-dark" onclick="location.href='admin_nounous.php'">Nounous</button>
            </div>
            <div class="col-sm-2 sidenav">
              </div>
            </div>
          </div>
        </div>

    <footer class="container-fluid text-center">
    </footer>

    </body>
</html>



