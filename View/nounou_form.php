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
        <h1> Connexion </h1>    
        
        <?php
            //message a afficher en fonction de certain cas
            $message="Inscription avec succés, vous pouvez maintenant vous connecter";
            message5Secondes($message,'coOK');
            $identifiant="Les identifiants sont éronnés";
            message5Secondes($identifiant,'wrongID');
            $message2="Un problème est survenue ! <br> Si cela persiste merci de contacter notre admin";
            message5Secondes($message2,'pb');
            
            //formulaire
            debutForm($method,$action, 'onsubmit="return verifFormNounou(this)"');
            formInput('Mail ','text','email','onblur="verifMail(this)"');
            formInput('Mot de passe ','password','mdp','onblur="verif(this)"');
            formAddSubmitReset();
            finForm();
        ?> 
    </body>
</html>