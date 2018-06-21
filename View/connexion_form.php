<?php
session_start();
if (isset($_SESSION['connexion'])) {
    if ($_SESSION['connexion'] == true) {
        header('Location: choix.php');
        exit();
    }
}
?>
<!--
    Formulaire de connexion, renvoi les infos vers connexion_acion.php
    //$_SESSION contient : connexion (true or false) idIdentifiant , nounouOUparents (contient soit nounou soit parents), admin
-->
<html>
    <head>
        <title>Connexion</title>
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
            <a class="navbar-brand" href="welcome.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'connexion_form.php'">Connexion</button>
            </div>
        </nav>
        <div class="container">
            <h1 class="text-center">Connexion</h1>

            <div class="row">
                <div class="col-sm-2">
                    <button type="button" class="btn" onclick="location.href = 'inscription_form.php'">S'inscrire</button>
                </div>
                <div class="col-sm-8">
                    <?php
                    //message a afficher en fonction de certain cas
                    $message = "Inscription avec succés, vous pouvez maintenant vous connecter";
                    message5Secondes($message, 'coOK');
                    $erreur = "Une erreur est survenue merci de bien vouloir vous reconnecter. <br>Si cela persiste, contacter nous.";
                    message5Secondes($erreur, 'pb');
                    $identifiant = "Les identifiants sont éronnés";
                    message5Secondes($identifiant, 'wrongID');

                    //formulaire
                    debutForm($method, $action, 'onsubmit="return verifFormConnexion(this)"');
                    formInput('Mail ', 'email', 'email', 'onblur="verifMail(this)"');
                    formInput('Mot de passe ', 'password', 'mdp', 'onblur="verif(this)"');
                    formAddSubmitReset();
                    finForm();
                    ?> 
                </div>
            </div>
        </div>  
    </body>
    <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">
        <hr>
        <!-- Call to action -->
        <ul class="list-unstyled list-inline text-center py-2">
            <li class="list-inline-item">
                <button onclick="location.href='contact.php'" class="btn btn-default btn-rounded">Contact</button>
            </li>
        </ul>
        <!-- Call to action -->
        <hr>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
        </div>
        <!-- Copyright -->
    </footer>
</html>


