<?php
session_start();
include '../Objets/Utilisateur.php';
include '../Objets/Nounou.php';
include '../Functions/Functions.php';
$user = $_SESSION['idUtilisateur'];
$user = new Utilisateur($_SESSION['idUtilisateur']);
$nounou = new Nounou($user->getIdNounous());
?>

<!DOCTYPE html>
<!--
    Page home
    

-->
<html>
    <head>
        <title>Nounou</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php"><?php echo(ucfirst($_SESSION['nounouOUparents'])) ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <hr>
                    <img src="../include/images/nounou.png" class="img-fluid" alt="Logo Nounou">
                </div>
                <div class="col-sm-8 text-left">
                    <h1>
                        <?php
                        echo("Nounou ".ucfirst($user->getNom()));
                        echo(" " . ucfirst($nounou->getPrénom()));
                        ?>
                    </h1>
                    <?php
                    if (!$nounou->getVisible()) {
                        echo("Vous n'êtes pas validé par l'administrateur, surêment car vous venez de vous inscrire. <br>"
                        . "Sinon, veuillez contacter notre administrateur, vous avez surêment été bloqué(e) pour une raison spécifique.");
                    }
                    ?>
                    <hr>

                    <h3>Mes gardes</h3>
                    <?php affiche($nounou->getGardeAVenir()); ?>
                    <button type="button" class="btn" onclick="location.href = 'ajout_garde.php'">+</button>
                    <button type="button" class="btn" onclick="location.href = 'enlever_garde.php'">-</button>

                    <h3>Mes langues</h3>
                    <?php affiche($nounou->getLangue()); ?>
                    <button type="button" class="btn" onclick="location.href = 'ajout_langue.php'">+</button>
                    <button type="button" class="btn" onclick="location.href = 'enlever_langue.php'">-</button>
                </div>
                <div class="col-sm-2 sidenav">
                </div>
            </div>
        </div>
    </body>
    <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
        </div>
        <!-- Copyright -->
    </footer>
</html>
