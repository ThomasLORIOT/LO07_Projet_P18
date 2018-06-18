<?php
session_start();
require_once '../Objets/Utilisateur.php';
require_once '../Objets/Nounou.php';
require_once '../Functions/Functions_Formulaires.php';
require_once '../Functions/Functions.php';
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
        <title>Ajout langue</title>
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
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container">
            <h1 class="text-center">Vérification</h1>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <button class="btn btn-dark" onclick="location.href = 'ajout_garde.php'">Retour</button>
                </div>
                <div class="col-sm-8">
                    <?php
                    if (isset($_POST['date']) && isset($_POST['heureDébut']) && isset($_POST['heureFin']) && isset($_POST['langue']) && isset($_POST['enfantsMax'])) {
                        //crée l'horaire et la'ajouter à la DB, ne s'ajoute que si elle n'existe pas
                        $horaire = new Horaires($_POST['date'], $_POST['heureDébut'], $_POST['heureFin']);
                        $horaire->addDB();
                        echo("horaire crée");
                        //recupérer l'id de l'horaire 
                        $myDB = connectDB();
                        $requete = "SELECT idHoraires FROM horaires WHERE Date = '".$_POST['date']."' AND `Heure Début` = '".$_POST['heureDébut']."' AND `Heure Fin` = '".$_POST['heureFin']."'";
                        $res2 = $myDB->query($requete);
                        $id = mysqli_fetch_assoc($res2);
                        $horaire->setIdHoraires($id['idHoraires']);
                        debug($horaire);
                        //crée la garde et l'ajoute à la DB
                        $garde = new Garde($nounou->getIdNounous(), $horaire->getIdHoraires(), $_POST['langue'], $_POST['enfantsMax']);
                        if($garde->addDB()){
                            echo("La garde à bien été ajoutée.<br>");
                            echo("Les parents intéressés pourront ajouter leurs enfants de votre garde.");
                        } else {
                            echo("La garde n'a pas pu être ajoutée, vérifiez si vous avez correctement remplie le formulaire");
                        }
                        
                    } else {
                        echo("Formulaire pas rempli entièrement");
                    }
                    ?>


                </div>
            </div>
        </div>

        <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018 Copyright : Créer par Thomas Loriot et Vladimir Trois
            </div>
            <!-- Copyright -->
        </footer>

    </body>
</html>

