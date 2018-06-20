<!DOCTYPE html>
<!--
Renvoi sur inscription ou connexion 




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
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
        <?php
        include '../Functions/Functions.php';
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php">Contact</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <?php retour(); ?>
            </div>
        </nav>
        <div class="container text-center">
            <h1 class="text-center">Plein de question ?</h1>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <hr>
                    <p>Comment mes données sont-elles stockées ?</p>
                    <p>J'ai été bloqué et je ne sais pas pourquoi ?</p>
                    <p>Je veux juste vous parler car vous semblez être sympa ?</p>
                    <p>et pour toute les autres questions que vous avez, une seul adresse :
                    <a href="mailto:nounou@nounou.fr" class='alert-light' target="_blank" title="nounou@nounou.fr" rel="noopener noreferrer">nounou@nou.fr</a>
                    </p>
                    <img src="../include/images/contact.jpg" class="img-rounded" alt="Contact Image"> 
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>
        <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">
          <hr>
          <!-- Call to action -->
          <ul class="list-unstyled list-inline text-center py-2">
            <li class="list-inline-item">
                <button onclick="location.href='contact.php'" class="btn btn-default btn-rounded">Contact</button>
            </li>
          </ul>
          <!-- Call to action -->
          <hr>
          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
          </div>
          <!-- Copyright -->
        </footer>
    </body>
</html>
