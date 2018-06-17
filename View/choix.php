<?php
    session_start();
    if(isset($_SESSION['connexion'])){
        if(isset($_SESSION['nounouOUparents'])){
            header('Location: home.php');
            exit();
        }
        echo('not set :p');
        
    }
    session_destroy();
?>
<html>
    <head>
        <title>Choix</title>
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
            <h1 class="text-center">Vous êtes nounou ou parents ?</h1>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn" onclick="location.href='nounou_form.php'">Nounou</button>
                    <button type="button" class="btn" onclick="location.href='parents_form.php'">Parents</button>
                </div>
            </div>
        </div>
    </body>
</html>