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
            $action="";
            if(!empty($_POST))                print_r($_POST);
        ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Inscription Parent</h1>
            <div class="block-center">
                <?php            
                    //formulaire
                    debutForm($method,$action, 'onsubmit="return verifFormParents(this)"');
                    formInput('Ville ','text','ville','onblur="verif(this)"');
                    textArea('info',"Avez-vous des éléments importants pour l'organisation",'5','60','onblur="verifTextArea(this)" ');
                ?>
                <div id='enfants'>
                    <fieldset id='enfant[]' class="scheduler-border">
                        <legend  class="scheduler-border">Enfants</legend>
                        <div  class="control-group">
                            <?php
                               formInput('Nom', 'text', 'nom[]', 'onblur="verif(this)"');
                               formInput('Date de naissance', 'date[]', 'date', 'onblur="verif(this)"');
                               textArea('restrictions[]',"L'enfant à t'il des restrictions alimentaires ?",'5','60','onblur="verifTextArea(this,0)" ');
                            ?>
                        </div>
                    </fieldset>
                </div>
                    <?php
                    formAddSubmitReset();
                    finForm();
                ?>
                <input type="button" onclick="ajout()" class='btn btn-default' value="ajouter un champ"/>
                <input type="button" onclick="enlever()" class='btn btn-default' value="enlever le champ"/>
                    <script type="text/javascript" >
                            var field = document.getElementById('enfants');
                            var div1=document.getElementById('enfant[]');
                            function ajout(){
                                clone=div1.cloneNode(true);
                                clone.id='enfant[]';
                                field.appendChild(clone)                                
                            }
                            function enlever(){
                                child=document.getElementById('enfant[]')
                                field.removeChild(child);
                            }
                    </script>
            </div>
        </div>                
    </body>

</html>
