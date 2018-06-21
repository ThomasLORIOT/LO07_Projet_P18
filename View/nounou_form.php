<!--
    Formulaire pour devenir nounou

-->
<html>
    <head>
        <title>Nounou - Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src='../Functions/Functions_JS.js'></script>
        <?php
        include '../Functions/Functions_Formulaires.php';
        include '../Functions/Functions.php';
        $method = "post";
        $action = "nounou_form_action.php";
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
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'deconnexion.php'">Déconnexion</button>
            </div>
        </nav>
        <div class="container">
            <h1 class="text-center">Devenir Nounou</h1>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <button class="btn btn-dark" onclick="location.href = 'choix.php'">Retour</button>
                </div>
                <div class="col-sm-8">


                <?php
                //formulaire
                debutForm($method, $action, 'onsubmit="return verifFormNounou(this)"');
                formInput('Prénom ', 'text', 'prenom', 'onblur="verif(this)"');
                formInput('Telephone', 'text', 'telephone', 'onblur="verifTel(this)"');
                formInput('Age', 'text', 'age', 'onblur="verifAge(this)"');
                textArea('presentation', 'Veuillez vous présenter en quelques lignes', '5', '60', 'onblur="verifTextArea(this,30)"');
                textArea('experience', 'Avez-vous des expériences en tant que Nounou ?', '5', '60', 'onblur="verifTextArea(this,30)"');
                formAddSubmitReset();
                finForm();
                ?>
                </div>
            </div>
        </div>
    </body>
</html>