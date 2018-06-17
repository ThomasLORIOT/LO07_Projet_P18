<?php
    session_start();        
    require_once '../Objets/Utilisateur.php';
    require_once '../Objets/Nounou.php';
    require_once '../Functions/Functions_Formulaires.php';
    require_once '../Objets/Langue.php';
    $user=$_SESSION['idUtilisateur'];
    $user= new Utilisateur($_SESSION['idUtilisateur']);
    $nounou= new Nounou($user->getIdNounous());
    if (!$nounou->getVisible()){
        header('Location: home.php');
        exit();

    }
         
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
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="home.php"><?php echo(ucfirst($_SESSION['nounouOUparents']))?></a>
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

                <?php $langues = assoc_langues() ; echo("<pre>") ; print_r($langues);  ?>

            </div>
            <div class="col-sm-2 sidenav">
              </div>
            </div>
          </div>
        </div>

    <footer class="container-fluid text-center">
      <p>Footer</p>
    </footer>

    </body>
</html>
