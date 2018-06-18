<!--
    Formulaire d'inscription, renvoi les infos vers inscription_action.php

-->
<html>
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- load jquery avant js --> 
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
        <?php
        include '../Functions/Functions_Formulaires.php';
        include '../Functions/Functions.php';
        $method = "post";
        $action = "inscription_action.php";
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
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'connexion_form.php'">Connexion</button>
            </div>
        </nav>
        <div class="container">
            <h1 class="text-center">Inscription</h1>
            <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn" onclick="location.href = 'connexion_form.php'">Se connecter</button>
                </div>
                <div class="col-sm-4">
                    <?php
                    //message
                    $message = "Un utilisateur possède déjà ce mail";
                    message5Secondes($message, 'mail');
                    //form
                    debutForm($method, $action, 'onsubmit="return verifFormInscription(this)"');
                    formInput('Nom ', 'text', 'nom', 'onblur="verif(this)"');
                    formInput('Mail ', 'text', 'email', 'onblur="verifMail(this)"');
                    formInput('Mot de passe ', 'password', 'mdp', 'onblur="verif(this)"');
                    formAddSubmitReset();
                    finForm();
                    ?> 

                </div>
            </div>
        </div>
    </body>
</html>

