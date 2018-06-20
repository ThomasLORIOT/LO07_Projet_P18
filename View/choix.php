<?php
session_start();
if (isset($_SESSION['connexion'])) {
    if (isset($_SESSION['nounouOUparents'])) {
        header('Location: home.php');
        exit();
    }
}
?>
<html>
    <head>
        <title>Choix</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
        <?php
        include '../Functions/Functions_Formulaires.php';
        include '../Functions/Functions.php';
        $method = "post";
        $action = "connexion_action.php";
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="welcome.php">Acceuil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'deconnexion.php'">Déconnexion</button>
            </div>
        </nav>
        <div class="container text-center">
            <h1 class="text-center">Vous êtes nounou ou parents ?</h1>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <p>A vous de choisir pourquoi vous êtes venu ! </p>
                    <button type="button" class="btn btn-dark" onclick="location.href = 'nounou_form.php'">Je suis Nounou</button>
                    <button type="button" class="btn btn-dark" onclick="location.href = 'parents_form.php'">Je suis Parents</button>
                </div>
            </div>
        </div>
    </body>
    <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
        </div>
        <!-- Copyright -->
    </footer>
</html>