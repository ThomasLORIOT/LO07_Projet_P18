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
            <a class="navbar-brand" href="welcome.php">Bienvenue</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <button class="btn btn-dark text-left" onclick="location.href = 'inscription_form.php'">Inscription</button>
                </ul>
                
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'connexion_form.php'">Connexion</button>
            </div>
        </nav>
        <div class="container text-center">
            <h1 class="text-center">Bienvenue chez Nou !</h1>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">
                    <?php
                    $message = "Un problème est survenue ! <br> Si cela persiste merci de contacter notre admin";
                    message5Secondes($message, 'pb');
                    ?>
                    <p>Nous mettons en relations les nounous et les parents</p>
                    <img src="../include/images/bandeau_welcome.jpg" class="img-fluid" alt="Bandeau welcome parent et bébé">
                    <hr>
                    <div class='text-left'>
                    <h2>Qui sommes-nous ?</h2>
                        <p>Notre entreprise est située à Troyes, nous l'avons créée en Mai 2018 et depuis nous nous consacrons à l'agrandir et à l'améliorer.
                        Nous voulons chaque jour apporter de nouvelles fonctionnalités pour mettre en relation les gens. Pour le moment ce site est le premier d'une grande flotte.</p>
                        <h2>Que peut on faire ici ?</h2>
                        <p>Cette plateforme permet à toute personne de garder des enfants ou faire garder ses enfants. Vous avez juste à vous inscrire et à choisir si vous 
                        êtes nounou ou parent. Vous aurez ensuite accès à toutes nos fonctionnalités. <P>
                        <p> <strong>En tant que nounou</strong> vous pouvez gérer vos disponibilités, indiquer les langues étrangères que vous parlez, accéder au planning de vos gardes.</p>
                        <p> <strong>En tant que parent</strong> vous pouvez ajouter toutes les informations nécéssaires à l'organisation d'une garde, indiquer les informations importantes sur
                            vos enfants (les allergies, les restrictions alimentaires,...), rechercher une nounou disponible ou une nounou qui parle une langue étrangère pour une garde linguistique.
                        </p>
                    </div>
                    <hr>
                    <h3>Vous êtes nounou ?</h3>
                    <p>Ici vous pouvez trouver les meilleurs parents de votre ville et garder en toute simplicité leurs enfants.</p>
                    <h3>Vous êtes parents ?</h3>
                    <p>Ici vous pouvez trouver les meilleurs nounous de votre ville.</p>

                    <button type="button" class="btn btn-dark" onclick="location.href = 'connexion_form.php'">Connectez vous</button>
                    <button type="button" class="btn btn-dark" onclick="location.href = 'inscription_form.php'">Inscrivez vous</button>

                </div>
                <div class="col-sm-1">
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
