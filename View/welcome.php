<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  <!--shrink-to-fit=no -->
        <title>Welcome</title>
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../functions/Functions_JS.js"></script>
        <?php 
           include '../functions/Functions.php'; 
        ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Bienvenue !</h1>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <?php 
                        $message="Un problème est survenue ! <br> Si cela persiste merci de contacter notre admin";
                        message5Secondes($message,'pb');
                    ?>
                    <button type="button" class="btn" onclick="location.href='connexion_form.php'">Se connecter</button>
                    <button type="button" class="btn" onclick="location.href='inscription_form.php'">S'inscrire</button>
                </div>
            </div>
        </div>
    </body>
</html>
