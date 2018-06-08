<?php include '../functions/Functions_Formulaires.php'; 
    $method = "post";
    $action="inscription_action.php";
?>


<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <h1> Inscription </h1>
        
        <?php 
            debutForm($method,$action); 
            formInput('Nom', 'text');
            formInput('Mail','text');
            formInput('Mot de passe','password');
            formAddSubmitReset();
            finForm();
        ?> 
    </body>
</html>
