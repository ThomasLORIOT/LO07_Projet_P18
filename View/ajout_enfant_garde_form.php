<?php
session_start();
include '../Objets/Utilisateur.php';
include '../Objets/Parents.php';
include '../Functions/Functions_Formulaires.php';
include '../Functions/Functions.php';
$user = $_SESSION['idUtilisateur'];
$user = new Utilisateur($_SESSION['idUtilisateur']);
$parent = new Parents($user->getIdParents());
?>

<!DOCTYPE html>
<!--
    Formulaire parents pour l'ajout des enfants dans une garde
    

-->
<html>
    <head>
        <title>Choix garde</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><?php echo(ucfirst($_SESSION['nounouOUparents'])) ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
                    <button class="btn btn-dark" onclick="location.href = 'choix.php'">Retour</button>
                </div>
                <div class="col-sm-8 text-left"> 
                    <h1>Garde correspondante : </h1>
                    <?php
                    if (isset($_POST['date']) && isset($_POST['heureDébut']) && $_POST['heureFin']) {
                        $gardeCorespondante=afficherGardeCorrespondant($_POST['date'], $_POST['heureDébut'], $_POST['heureFin']);
                        if(empty($gardeCorespondante)){
                            echo("Aucune garde ne corespond à votre recherche");
                        }else{
                            affiche(afficherGardeCorrespondant($_POST['date'], $_POST['heureDébut'], $_POST['heureFin']));
                        }
                    } else {
                        echo("formulaire incomplet");
                    }
                    ?>
                    <hr>
                    <h3>Mes Enfants</h3>
                    <?php affiche($parent->getEnfant()) ?>
                </div>
                <div class="col-sm-2 sidenav">
                    <div class="well">
                        <?php
                        //formulaire pour voir la nounou
                        debutForm("POST", "information_nounou.php");
                        formInput('Afficher informations de la nounou numéro', 'text', 'idNounou');
                        formAddSubmitReset();
                        finForm();
                        ?>
                        <hr>
                        <?php
                        //formulaire pour voir la nounou
                        debutForm("POST", "ajout_enfant_garde_action.php");
                        formInput("Entrer l'id de l'enfant", 'text', 'idEnfant');
                        formInput("Entrer l'id de la nounou", 'text', 'idNounou');
                        formInput("Entrer l'id de l'horaire", 'text', 'idHoraire');
                        formAddSubmitReset();
                        finForm();
                        ?>
                    </div>
                    <div class="well">

                    </div>
                </div>
            </div>
        </div>

        <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
            </div>
            <!-- Copyright -->
        </footer>

    </body>
</html>