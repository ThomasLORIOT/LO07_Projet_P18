<?php
require_once '../../Functions/Functions_admin.php';
require_once '../../Functions/Functions_Formulaires.php';

if (isset($_POST['idVal'])){
    gérerVisibilitéNounou($_POST['idVal'], 1);
    echo("nounou id ".$_POST['idVal']." bien devenue visible");
    unset($_POST['idVal']);
}
if (isset($_POST['idSup'])){
    gérerVisibilitéNounou($_POST['idSup'], 0);
    echo("nounou id ".$_POST['idSup']." bien devenue invisible<br>");
    unset($_POST['idSup']);
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
        <link rel="stylesheet" href="../../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'admin.php'">Retour</button>
                </div>
                <div class="col-sm-8 text-left">
                    <?php listeNounous() ?>
                </div>
                <div class="col-sm-2 sidenav">
                    <h5>Entrer id de la nounou à rendre visible</h5><br>
                    <?php 
                    debutForm("POST", "admin_nounous.php");
                    formInput("Nounou", "text", "idVal");
                    ?>
                    <hr>
                    
                    <h5>Entrer id de la nounou rendre invisible</h5><br>
                    <?php
                    formInput("Nounou", "text", "idSup");
                    echo("<br>");
                    Submit("Confirmer");
                    finForm();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Footer</p>
    </footer>

</body>
</html>






