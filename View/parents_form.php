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
            $action="parents_form_action";
        ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Inscription Parent</h1>
            <div class="block-center">
                <div>
                <?php            
                    //formulaire
                    debutForm($method,$action, 'onsubmit="return verifFormParents(this)"');
                    formInput('Ville ','text','ville','onblur="verif(this)"');
                    textArea('info',"Avez-vous des éléments importants pour l'organisation",'5','60','onblur="verifTextArea(this,2)" ');
                    //formSelect('nbEnfants',"Combien d'enfant avez vous ?", array(1,2,3,4,5,6,7,8,9,10), 'onchange="ajouteEnfant(this)"');
                    formAddSubmitReset();
                    finForm();
                ?>
            </div>
        </div>                
    </body>

</html>
