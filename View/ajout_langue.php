<?php
    session_start();        
    require_once '../Objets/Utilisateur.php';
    require_once '../Objets/Nounou.php';
    require_once '../Functions/Functions_Formulaires.php';
    require_once '../Objets/Langue.php';
    require_once '../Functions/Functions.php';
    $user=$_SESSION['idUtilisateur'];
    $user= new Utilisateur($_SESSION['idUtilisateur']);
    $nounou= new Nounou($user->getIdNounous());
    
    
    if (isset($_POST['newLangue'])){
        $langue = new Langue($_POST['newLangue'],0);
        $langue->addDB();
        header('Location: ajout_langue.php?ajout=1');
        exit();
    }
?>

<!DOCTYPE html>
<!--
    Page home
    

-->
<html>
    <head>
        <title>Ajout langue</title>
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
                <hr>
                <button class="btn btn-default my-2 my-sm-0" onclick="location.href='home.php'">Retour</button>
            </div>
            <div class="col-sm-8 text-left">
                <h1>Ajouter des langues</h1>
                <?php
                    $message="L'ajout de la langue a été pris en compte, notre administrateur l'ajoutera si elle est correcte";
                    message5Secondes($message,'ajout');
                    
                    //ajout des langues
                    $action='ajout_langue_niveau.php';
                    $langues = tabLangues(); 
                    debutForm('GET', $action);
                    formSelect('langue[]', 'Choissisez les langues que vous parlez', $langues,'multiple');
                    formAddSubmitReset();
                    finForm();
                    
                    //formulaire d'ajout de langue nouvelle
                    debutForm('POST', 'ajout_langue.php');
                    formInput('Ajouter une nouvelle langue, elle sera ensuite validé par notre administrateur', 'string', 'newLangue');
                    formAddSubmitReset();
                    finForm();
                ?>

            </div>
            <div class="col-sm-2 sidenav">
              </div>
            </div>
          </div>
        </div>

    <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
        </div>
        <!-- Copyright -->
    </footer>

    </body>
</html>
