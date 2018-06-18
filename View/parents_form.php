<html>
    <head>
        <title>Parents - Formulaire</title>
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
        $action = "parents_form_action";
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
        <div class="container">
            <h1 class="text-center">Inscription Parent</h1>
            <hr>
            <div class="row">         
                <div class="col-sm-2">
                    <button class="btn btn-dark" onclick="location.href = 'choix.php'">Retour</button>
                </div>
                <div class="col-sm-8">
                    <div>
                        <?php
                        //formulaire
                        debutForm($method, $action, 'onsubmit="return verifFormParents(this)"');
                        formInput('Ville ', 'text', 'ville', 'onblur="verif(this)"');
                        textArea('info', "Avez-vous des éléments importants pour l'organisation", '5', '60', 'onblur="verifTextArea(this,0)" ');
                        //formSelect('nbEnfants',"Combien d'enfant avez vous ?", array(1,2,3,4,5,6,7,8,9,10), 'onchange="ajouteEnfant(this)"');
                        formAddSubmitReset();
                        finForm();
                        ?>
                    </div>
                </div>
            </div>                
    </body>

</html>
