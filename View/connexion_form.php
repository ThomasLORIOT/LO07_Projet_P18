
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../functions/Functions_JS.js"></script>
        <?php 
            include '../functions/Functions_Formulaires.php'; 
            include '../functions/Functions.php'; 
            $method = "post";
            $action="connexion_action.php";
        ?>
    </head>
    <body>
        <h1> Connexion </h1>    
        
        <?php
            $message="Inscription avec succés, vous pouvez maintenant vous connecter";
            message5Secondes($message,'coOK');
            debutForm($method,$action, 'onsubmit="return verifForm(this)"');
            formInput('Mail ','text','email','onblur="verifMail(this)"');
            formInput('Mot de passe ','password','mdp','onblur="verif(this)"');
            formAddSubmitReset();
            finForm();
        ?> 
    </body>
</html>


