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
            $action="inscription_action.php";
        ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Inscription</h1>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <?php
                        //message
                        $message="Un utilisateur possède déjà ce mail";
                        message5Secondes($message,'mail');
                        //form
                        debutForm($method,$action, 'onsubmit="return verifFormInscription(this)"'); 
                        formInput('Nom ', 'text', 'nom','onblur="verif(this)"');
                        formInput('Mail ','text','email','onblur="verifMail(this)"');
                        formInput('Mot de passe ','password','mdp','onblur="verif(this)"');
                        formAddSubmitReset();
                        finForm();
                    ?> 
                </div>
            </div>
        </div>
    </body>
</html>

