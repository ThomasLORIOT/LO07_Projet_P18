<?php
//    session_start();
//    if(isset($_SESSION['connexion'])){
//        if($_SESSION['connexion']==true){
//            header('Location: choix.php');
//            exit();
//        }
//        
//    }
?>
<!--
    Formulaire de connexion, renvoi les infos vers connexion_acion.php

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
            $action="connexion_action.php";
        ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Connexion</h1>
            <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn" onclick="location.href='inscription_form.php'">S'inscrire</button>
                </div>
                <div class="col-sm-4">
                    <?php
                        //message a afficher en fonction de certain cas
                        $message="Inscription avec succés, vous pouvez maintenant vous connecter";
                        message5Secondes($message,'coOK');
                        $identifiant="Les identifiants sont éronnés";
                        message5Secondes($identifiant,'wrongID');
                        $message2="Un problème est survenue ! <br> Si cela persiste merci de contacter notre admin";
                        message5Secondes($message2,'pb');

                        //formulaire
                        debutForm($method,$action, 'onsubmit="return verifFormConnexion(this)"');
                        formInput('Mail ','email','email','onblur="verifMail(this)"');
                        formInput('Mot de passe ','password','mdp','onblur="verif(this)"');
                        formAddSubmitReset();
                        finForm();
                    ?> 
                </div>
            </div>
        </div>  
    </body>
</html>


