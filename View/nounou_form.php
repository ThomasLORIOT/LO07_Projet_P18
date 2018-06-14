<html>
    <head>
        <title>Nounou - Formulaire</title>
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
            $action="nounou_form_action.php";
        ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Devenir Nounou</h1>
            <div class=block-center>                
                    <?php            
                       //formulaire
                       debutForm($method,$action, 'onsubmit="return verifFormNounou(this)"');
                       formInput('Prénom ','text','prenom','onblur="verif(this)"');
                       formInput('Telephone','text','telephone','onblur="verifTel(this)"');
                       formInput('Age','text','age','onblur="verifAge(this)"');
                       textArea('presentation','Veuillez vous présenter en quelques lignes','5','60','onblur="verifTextArea(this,30)" ');
                       textArea('experience','Avez-vous des expériences en tant que Nounou ?','5','60','onblur="verifTextArea(this,30)"');
                       formAddSubmitReset();
                       finForm();
                   ?>
            </div>
        </div>
    </body>
</html>