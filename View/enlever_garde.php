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
    Page parents pour enlever une garde prise
    

-->
<html>
    <head>
        <title>Enlever garde</title>
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
            <h1 class="text-center">Vos gardes</h1>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <button class="btn btn-dark" onclick="location.href = 'choix.php'">Retour</button>
                    <hr>
                    <?php
                    $id = $nounou->getIdNounous();
                    if (isset($_POST['idHoraires'])) {
                        $idHoraires = $_POST['idHoraires'];
                        $requete3 = "DELETE FROM enfants_gardé WHERE idNounous=$id AND idHoraires = $idHoraires";
                        $requete2 = "DELETE FROM garde WHERE idNounous=$id AND idHoraires = $idHoraires";
                        $myDB2 = connectDB();
                        requete($requete3);
                        requete($requete2);
                        echo("La garde à été supprimée");
                        unset($_POST['idHoraires']);
                    }
                    ?>
                </div>
                <div class="col-sm-8">
                    <?php
                    $requete = "SELECT horaires.idHoraires, Date, `Heure Début`, `Heure Fin`, Langue FROM garde NATURAL JOIN horaires WHERE garde.idNounous = $id AND Date > CURRENT_DATE() ORDER BY Date";
                    $myDB = connectPDO();
                    $result = $myDB->query($requete);
                    $ListeGarde = Array();
                    $i = 0;
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $ListeGarde[$i] = $row;
                        $i++;
                    }
                    affiche($ListeGarde);
                    ?>
                </div>
                <div class="col-sm-2 sidenav">

                    <?php
                    debutForm("POST", "enlever_garde.php");
                    formInput("Entrer idHoraires de la garde à supprimer", "text", "idHoraires");
                    formAddSubmitReset("Confirmer");
                    finForm();
                    ?>
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
