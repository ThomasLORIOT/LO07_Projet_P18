<?php
require_once '../../Functions/Functions_admin.php';
require_once '../../Functions/Functions_Formulaires.php';
require_once '../../Functions/Functions.php';

if (isset($_POST['idVal'])) {
    accepterCandidature($_POST['idVal']);
    //echo("candidature de nounou id " . $_POST['idVal'] . " à bien été validée<br>");
    unset($_POST['idVal']);
}
if (isset($_POST['idSup'])) {
    supprimeNounous($_POST['idSup']);
    //echo("nounou id " . $_POST['idSup'] . " à bien été supprimé<br>");
    unset($_POST['idSup']);
}
?>
<!DOCTYPE html>
<!--
    Page admin poour la gestion des candidatures
    

-->
<html>
    <head>
        <title>Admin</title>
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
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = '../deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row">
                <div class="col-sm-2 sidenav">
                    <hr>
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'admin.php'">Retour</button>
                </div>
                <div class="col-sm-8 text-left">
                    <?php 
                    $candidature=getCandidatures();
                    if(empty($candidature)){
                        echo("<hr><h4>Vous n'avez pas de candidatures</h4>");
                    }else{
                        affiche($candidature);
                    }
                    ?>
                </div>
                <div class="col-sm-2 sidenav">
                    <hr>
                    <?php
                    debutForm("POST", "admin_candidatures.php");
                    formInput("<h5 class='text-success'>Entrer idNounou à valider</h5>", "text", "idVal");
                    echo("<hr>");
                    formInput("<h5 class='text-danger'>Entrer idNounou à supprimer</h5>", "text", "idSup");
                    formAddSubmitReset("Confirmer");
                    finForm();
                    ?>
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


